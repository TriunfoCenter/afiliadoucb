<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se foi enviado um campo 'caminhoCompleto' via POST
    if (isset($_POST['caminhoCompleto'])) {
        // Remove qualquer entidade HTML não desejada do caminho completo
        $caminhoCompleto = $_POST['caminhoCompleto'];
    }
}

// Inclui o arquivo de conexão com o banco de dados
include('../../../src/settings/conexao.php');

// Verifica se o caminho completo foi definido
if (!isset($caminhoCompleto)) {
    die("O caminho completo não foi especificado.");
}

// Caminho para o arquivo que contém as informações do produto
$caminho_arquivo = $caminhoCompleto;

// Verifica se o arquivo existe
if (!file_exists($caminho_arquivo)) {
    die("O arquivo de origem não existe.");
}

// Carrega o conteúdo do arquivo product_source.php
$conteudo = file_get_contents($caminho_arquivo);

// Função para extrair o título do produto
function extrairTitulo($html) {
    // Expressão regular para encontrar o título dentro da tag <h1>
    $pattern = '/<h1 class="dsvia-heading css-1cx4w9k">(.*?)<\/h1>/s';
    preg_match($pattern, $html, $matches);

    if (isset($matches[1])) {
        // Obtém as quatro primeiras palavras do título
        $palavras = explode(' ', $matches[1]);
        $titulo = implode(' ', array_slice($palavras, 0, 4));
        return $titulo; // Retorna o título encontrado
    } else {
        return ''; // Retorna um valor padrão caso não encontre o título
    }
}

// Função para extrair o código do item do link
function extrairCodigoItem($caminhoCompleto) {
    $pattern = '/\/p\/([0-9]+)$/';
    preg_match($pattern, $caminhoCompleto, $matches);
    return isset($matches[1]) ? $matches[1] : '';
}

// Extrai o título do produto
$titulo = extrairTitulo($conteudo);

// Remove caracteres indesejados do nome da pasta
$nome_pasta = preg_replace('/[^a-zA-Z0-9\- ]/', '', $titulo);

// Substitui espaços por hífens no nome da pasta
$nome_pasta = str_replace(' ', '-', $nome_pasta);

// Remove hífens duplicados
$nome_pasta = preg_replace('/-{2,}/', '-', $nome_pasta);

// Extrai o código do item
$codigo_item = extrairCodigoItem($caminhoCompleto);

// Define o caminho da pasta e o nome do arquivo
$caminho_pasta = '../../produtos/' . $nome_pasta;
$caminho_arquivo_destino = $caminho_pasta . '/' . $codigo_item . '.php';

// Cria a pasta se não existir
if (!is_dir($caminho_pasta)) {
    mkdir($caminho_pasta, 0777, true);
}

// Salva o conteúdo em um arquivo com o nome definido
file_put_contents($caminho_arquivo_destino, $conteudo);

// Exclui o arquivo antigo após lê-lo
if (file_exists($caminho_arquivo)) {
    unlink($caminho_arquivo);
}

// Função para extrair o valor do produto
function extrairValorProduto($html) {
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML($html);
    libxml_clear_errors();

    $xpath = new DOMXPath($dom);
    $elements = $xpath->query("//p[@class='dsvia-text css-alcf85']//span[@class='css-1vmkvrm']");

    if ($elements->length > 0) {
        $element = $elements->item(0);
        
        $valor = trim(str_replace(['R$', '&nbsp;'], '', $element->nodeValue));
        $valor = preg_replace('/[^0-9\,]/', '', $valor); // Remove todos os caracteres não numéricos exceto vírgulas
        $valor = str_replace(',', '.', $valor); // Substitui vírgulas por pontos para formatação correta do float
        return number_format(floatval($valor), 2, ',', '.'); // Formata o valor com vírgulas e ponto
    } else {
        return ''; // Retorna um valor padrão caso não encontre o valor
    }
}

// Extrai o valor do produto
$valor_produto = extrairValorProduto($conteudo);

$pattern = '/https:\/\/imgs\.casasbahia\.com\.br\/\d+\/([0-9]+)[a-zA-Z0-9]+\.jpg\?imwidth=\d+/';
// Inicializa array para armazenar os links das imagens
$links_imagens = [];

preg_match_all($pattern, $conteudo, $matches, PREG_SET_ORDER);

// Armazena os links encontrados no array $links_imagens
foreach ($matches as $match) {
    $grupo = $match[1]; // Captura o grupo (1, 2, 3, 4)
    $link = preg_replace('/\?imwidth=\d+$/', '', $match[0]); // Remove o parâmetro width da URL
    if (!isset($links_imagens[$grupo]) || !in_array($link, $links_imagens)) {
        $links_imagens[$grupo] = $link;
    }
}

// Inicializa o HTML para os links das imagens
$html_links = '';

// Loop para gerar HTML para cada link de imagem dentro de uma linha de tabela
foreach ($links_imagens as $grupo => $link) {
    $html_links .= '<tr>
                      <td>Imagem ' . $grupo . '</td>
                      <td><a>' . $link . '</a></td>
                      <td> 
                        <button type="button" class="btn btn-outline-warning">
                            <i class="mdi mdi-pencil"></i>
                        </button>
                        
                        <button type="button" class="btn btn-outline-danger">
                            <i class="mdi mdi-delete-forever"></i>
                        </button>   
                      </td>
                    </tr>';
}
// Inicializa o HTML para as imagens
$html_imagens = '';

// Loop para gerar HTML para cada imagem
foreach ($links_imagens as $grupo => $link) {
    $html_imagens .= '<div class="carder" style="width: 324px; float: left; margin-right: 10px; margin-bottom: 10px;">
                        <h4>Imagem ' . $grupo . '</h4>
                        <img src="' . $link . '" alt="Imagem ' . $grupo . '" style="width: 100%;">
                      </div>';
}

// Consulta ao banco de dados para obter as categorias
$sql = "SELECT nomeloja, nomelogin FROM config WHERE id = 1";
$result = $conn->query($sql);

// Verifica se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Extrai a linha de resultado como um array associativo
    $row = $result->fetch_assoc();
    // Salva o valor da coluna 'nomeloja' em uma variável
    $nomeloja = ucfirst($row['nomeloja']);
    $nomeLogin = ucfirst($row['nomelogin']);
} else {
    echo "Nenhum resultado encontrado.";
}

$query = "SELECT titulo, icone, mensagem FROM notificacoes ORDER BY id DESC";
$resultado = $conn->query($query);

// Fecha a conexão com o banco de dados
$conn->close();



?>





<!DOCTYPE html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Painel Admin - TriunfoStore</title>
    
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    
    <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    
    <link rel="stylesheet" href="../../assets/css/style.css">
    
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="../index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="../../assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $nomeLogin; ?></h5>
                  
                </div>
              </div>
              
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navegação</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="vendas.php">
              <span class="menu-icon">
                <i class="mdi mdi-cash-usd"></i>
              </span>
              <span class="menu-title">Vendas</span>
            </a>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-bss" aria-expanded="false" aria-controls="ui-bss">
              <span class="menu-icon">
                <i class="mdi mdi-receipt"></i>
              </span>
              <span class="menu-title">Cupom</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-bss">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="cupom.php">Listar Cupom</a></li>
                <li class="nav-item"> <a class="nav-link" href="addcupom.php">Adicionar novo cupom</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="usuarios.php">
              <span class="menu-icon">
                <i class="mdi mdi-account-box"></i>
              </span>
              <span class="menu-title">Usuarios</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="comentarios.php">
              <span class="menu-icon">
                <i class="mdi mdi-message-reply-text"></i>
              </span>
              <span class="menu-title">Comentarios</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Produtos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="listarprodutos.php">Gerenciar produtos</a></li>
                <li class="nav-item"> <a class="nav-link" href="adicionarproduto.php">Adicionar novo produto</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-bank"></i>
              </span>
              <span class="menu-title">Pagamentos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pagamentos.php">Analytics</a></li>
                <li class="nav-item"> <a class="nav-link" href="pix.php">Pix</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="moderadores.php">
              <span class="menu-icon">
                <i class="mdi mdi-desktop-mac"></i>
              </span>
              <span class="menu-title">Moderadores</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="config.php">
              <span class="menu-icon">
                <i class="mdi mdi-wrench"></i>
              </span>
              <span class="menu-title">Configurações</span>
            </a>
          </li>
          
        </ul>
      </nav>
      
      <div class="container-fluid page-body-wrapper">
        
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                  <h6 class="p-3 mb-0">Projects</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-file-outline text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-web text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">UI Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-layers text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Testing</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all projects</p>
                </div>
              </li>
              
              
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <?php
                if ($resultado->num_rows > 0) {
                  echo '<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">';
                  echo '<h6 class="p-3 mb-0">Notificações</h6>';
                  echo '<div class="dropdown-divider"></div>';
              
                  // Itera sobre os resultados e gera o HTML para cada notificação
                  while ($row = $resultado->fetch_assoc()) {
                      $title = $row['titulo'];
                      $icone = $row['icone'];
                      $mensagem = $row['mensagem'];
              
                      // Verifica a cor com base no título
                      if (stripos($title, 'Recebido') !== false) {
                          $iconColor = 'text-success';
                      } elseif (stripos($title, 'Pendente') !== false) {
                          $iconColor = 'text-warning';
                      } elseif (stripos($title, 'Cancelado') !== false) {
                          $iconColor = 'text-danger';
                      }elseif (stripos($title, 'Gerado') !== false) {
                        $iconColor = 'text-warning';
                      }else {
                          $iconColor = 'text-success';
                      }
              
                      echo '<a class="dropdown-item preview-item">';
                      echo '  <div class="preview-thumbnail">';
                      echo '      <div class="preview-icon bg-dark rounded-circle">';
                      echo "          <i class=\"mdi $icone $iconColor\"></i>";
                      echo '      </div>';
                      echo '  </div>';
                      echo '  <div class="preview-item-content">';
                      echo "      <p class=\"preview-subject mb-1\">$title</p>";
                      echo "      <p class=\"text-muted ellipsis mb-0\">$mensagem</p>";
                      echo '  </div>';
                      echo '</a>';
                      echo '<div class="dropdown-divider"></div>';
                  }
              
                  echo '<p class="p-3 mb-0 text-center">Veja as notificações</p>';
                  echo '</div>';
              } else {
                  // Caso não haja notificações
                  echo '<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">';
                  echo '<h6 class="p-3 mb-0">Notificações</h6>';
                  echo '<div class="dropdown-divider"></div>';
                  echo '<p class="p-3 mb-0 text-center">Nenhuma notificação encontrada</p>';
                  echo '</div>';
              }
?>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../../assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $nomeLogin; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Config</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Configurações</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Sair</p>
                    </div>
                  </a>
                  
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Adicionar Produto </h3>
              
            </div>

            
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Gerenciar produto </h4>
                    <p class="card-description"> TriunfoStore v1 </p>
                    <form class="forms-sample">
                      
                      <div class="form-group">
                        <label for="exampleInputMarca3">Nome</label>
                        <input type="text" class="form-control" id="exampleInputMarca3" placeholder="Nome" value="<?php echo $titulo; ?>">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputAtual4">Valor</label>
                        <input type="text" class="form-control" id="exampleInputAtual4" placeholder="Valor" value="<?php echo htmlspecialchars($valor_produto); ?>">
                      </div>
                     
                      

                  </fieldset>
                  
                  <div>

                      <label for="exampleInputPix4">Formas de Pagamento</label>
                      
                      <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> Aceitar Cartão <i class="input-helper"></i></label>
                            </div>

                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> Aceitar Pix <i class="input-helper"></i></label>
                            </div>

                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> Aceitar Boleto <i class="input-helper"></i></label>
                            </div>
                    
                  </div>
                     
                  <!-- Divisão principal para exibição das imagens -->
<!-- Divisão principal para exibição das imagens -->
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <?php echo $html_imagens; ?>
    </div>
</div>
<div class="form-group">
  <label>Acrescentar Imagem</label>
  <input type="file" name="img[]" class="file-upload-default" accept=".jpeg, .jpg, .png, .webp" id="file-upload" onchange="validateFileType()">
  <div class="input-group col-xs-12">
    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Carregar imagem">
    <span class="input-group-append">
      <button class="file-upload-browse btn btn-primary" type="button">Carregar</button>
    </span>
  </div>
  <div id="file-upload-error" style="color: red; display: none;">Por favor, selecione uma imagem nos formatos jpeg, jpg, png, ou webp</div>
</div>

<script>
  function validateFileType() {
    const fileInput = document.getElementById('file-upload');
    const filePath = fileInput.value;
    const allowedExtensions = /(\.jpeg|\.jpg|\.png|\.webp)$/i;
    const errorDiv = document.getElementById('file-upload-error');
    
    if (!allowedExtensions.exec(filePath)) {
      fileInput.value = '';
      errorDiv.style.display = 'block';
      return false;
    } else {
      errorDiv.style.display = 'none';
    }
  }
</script>


                  <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Gerenciar imagens</h4>
          
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            
                            <th> N° Imagem </th>
                            <th> Caminho </th>
                            <th> Editar | Excluir </th>
                          </tr>
                        </thead>
                        
                        
                       
                <?php echo $html_links; ?>
                
            </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              
            </div>

                  


                      
                      <button type="submit" class="btn btn-primary me-2">Adicionar</button>
                      <button class="btn btn-dark">Cancelar</button>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>


            </div>
          </div>
          
        </div>
        <style>
             .container {
      overflow: auto;
      display: flex;
      scroll-snap-type: x mandatory;
      width: 90%;
      margin: 0 auto;
      padding: 0 15px;
    }

    .carder {
      background: #191c24;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(7px);
      -webkit-backdrop-filter: blur(7px);
      border-radius: 10px;
      padding: 0.5rem; 
      margin: 1rem;
      width: 100%;
      scroll-snap-align: start;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .container:hover > :not(:hover) {
      opacity: 0.2;
    }

    .carder img {
      width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .carder span {
      margin-top: 0.5rem; 
      font-size: 0.875rem; 
      color: #ffffff; 
      font-family: 'Roboto', sans-serif;
      
    }


.file-upload-form {
  width: fit-content;
  height: fit-content;
  display: flex;
  align-items: center;
  justify-content: center;
}
.file-upload-label input {
  display: none;
}
.file-upload-label svg {
  height: 50px;
  fill: rgb(82, 82, 82);
  margin-bottom: 20px;
}
.file-upload-label {
  cursor: pointer;
  background-color: #ddd;
  padding: 30px 70px;
  border-radius: 40px;
  border: 2px dashed rgb(82, 82, 82);
  box-shadow: 0px 0px 200px -50px rgba(0, 0, 0, 0.719);
}
.file-upload-design {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 5px;
}
.browse-button {
  background-color: rgb(82, 82, 82);
  padding: 5px 15px;
  border-radius: 10px;
  color: white;
  transition: all 0.3s;
}
.browse-button:hover {
  background-color: rgb(14, 14, 14);
}
.cardering {
  display: flex;
  flex-direction: column;
  width: 230px;
  height: 280px;
  max-height: 330px;
  background-color: var(--white);
  border-radius: 10px;
  box-shadow: 0px 10px 12px rgba(0, 0, 0, 0.08),
    -4px -4px 12px rgba(0, 0, 0, 0.08);
  overflow: hidden;
  transition: all 0.3s;
  cursor: pointer;
  box-sizing: border-box;
  padding: 10px;
}

.cardering:hover {
  transform: translateY(-10px);
  box-shadow: 0px 20px 20px rgba(0, 0, 0, 0.1),
    -4px -4px 12px rgba(0, 0, 0, 0.08);
}

.cardering-image-container {
  width: 100%;
  height: 64%;
  border-radius: 10px;
  margin-bottom: 12px;
  overflow: hidden;
  background-color: rgb(165, 165, 165);
  display: flex;
  align-items: center;
  justify-content: center;
}

.image-icon {
  font-size: 40px;
}

.cardering-title {
  margin: 0;
  font-size: 17px;
  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
    "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  font-weight: 600;
  color: #1797b8;
  cursor: default;
  -webkit-box-orient: vertical;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 1;
  line-clamp: 1;
}

.cardering-des {
  -webkit-box-orient: vertical;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  line-clamp: 3;
  margin: 0;
  font-size: 13px;
  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
    "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  color: #1797b8;
  cursor: default;
}
        </style>
      </div>
      
    </div>
    
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
   
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
    
  </body>
</html>