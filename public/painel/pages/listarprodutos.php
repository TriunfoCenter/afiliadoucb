<?php
session_start();
include('../../../src/settings/conexao.php');

/* 

$sql = "SELECT * FROM vendas ORDER BY id DESC";
$result = $conn->query($sql);

// Array para armazenar os produtos
$produtos = array();

// Tabelas de produtos
$tabelas = array("aro13", "aro14", "aro15", "aro16", "aro17", "aro18", "aro19", "aro20", "acessorios", "bateria");

// Loop através de cada tabela
foreach ($tabelas as $tabela) {
    $sql = "SELECT * FROM " . $tabela . " ORDER BY id DESC"; // Consulta SQL para cada tabela
    $result = $conn->query($sql);

    // Adiciona os produtos ao array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $produtos[] = $row;
        }
    }
}

usort($produtos, function($a, $b) {
    return strlen($b['modelo']) - strlen($a['modelo']);
});

// Fechar a conexão com o banco de dados
mysqli_close($conn);

*/

$sql = "SELECT * FROM admin WHERE id = 1";
$resultt = $conn->query($sql);

if ($resultt->num_rows == 1) {
  
  $dados = $resultt->fetch_assoc();

  $nomeLogin = ucfirst(strtolower($dados['login']));

  


} else {
  echo "Nenhum resultado encontrado.";
}

$query = "SELECT titulo, icone, mensagem FROM notificacoes ORDER BY id DESC";
$resultado = $conn->query($query);


?>


<!DOCTYPE html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Painel Admin - TriunfoStore</title>
   
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
   
    <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  
    <link rel="stylesheet" href="../../assets/css/style.css">
    
   
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">

     
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="../index.php"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="../index.php"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
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
            <a class="navbar-brand brand-logo-mini" href="../index.php"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
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
                      $titulo = $row['titulo'];
                      $icone = $row['icone'];
                      $mensagem = $row['mensagem'];
              
                      // Verifica a cor com base no título
                      if (stripos($titulo, 'Recebido') !== false) {
                          $iconColor = 'text-success';
                      } elseif (stripos($titulo, 'Pendente') !== false) {
                          $iconColor = 'text-warning';
                      } elseif (stripos($titulo, 'Cancelado') !== false) {
                          $iconColor = 'text-danger';
                      }elseif (stripos($titulo, 'Gerado') !== false) {
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
                      echo "      <p class=\"preview-subject mb-1\">$titulo</p>";
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
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="row">
          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">12</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-dropbox icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total de Produtos</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">1</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-chart-areaspline icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total de Pedidos</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">17</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-sale icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total de Vendas</h6>
                  </div>
                </div>
              </div>
              
              
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">31</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-account-multiple icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total de Clientes</h6>
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
  background: rgba(255, 255, 255, 0.25);
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
  backdrop-filter: blur(7px);
  -webkit-backdrop-filter: blur(7px);
  border-radius: 10px;
  padding: 1rem;
  margin: 1rem;
  width: 230px;
  height: 280px;
  max-height: 330px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  transition: all 0.3s;
  cursor: pointer;
}

.carder:hover {
  transform: translateY(-10px);
  box-shadow: 0px 20px 20px rgba(0, 0, 0, 0.1), -4px -4px 12px rgba(0, 0, 0, 0.08);
}

.carder img {
  width: 100%;
  height: auto;
  border-radius: 10px;
}

.carder span {
  margin-top: 0.5rem;
  font-size: 0.875rem;
  color: #000000;
  font-family: 'Roboto', sans-serif;
}

.carder-title {
  margin: 0;
  font-size: 17px;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  font-weight: 600;
  color: #1797b8;
  cursor: default;
  -webkit-box-orient: vertical;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 1;
  line-clamp: 1;
}

.carder-des {
  margin: 0;
  font-size: 13px;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  color: #1797b8;
  cursor: default;
  -webkit-box-orient: vertical;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  line-clamp: 3;
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

<div class="row">           
<div class="col-xl-2 col-sm-2 grid-margin stretch-card">
  <div class="carder">
    <a href="https://micbet.tech/" target="_blank">
      <div class="carder-image-container">
        <img src="https://imgs.casasbahia.com.br/55065663/1g.jpg?imwidth=384" alt="Descrição da Imagem"/>
      </div>
    </a>
    <p class="carder-des">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, animi!
    </p>
  </div>
</div>

</div>

          </div>
         
        </div>
     
      </div>
   
    </div>
   
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
   
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
    
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    
    <script src="../../assets/js/dashboard.js"></script>
    
  </body>
</html>