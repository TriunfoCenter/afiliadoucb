<?php
session_start();
include('../../src/settings/conexao.php');

$sql = "SELECT * FROM total WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $dados = $result->fetch_assoc();
    $id = $dados['id'];
    $qntdepedidos = $dados['qntdepedidos'];
    $qntdeVendas = $dados['qntdeVendas'];
    $qntdeprodutos = $dados['qntdeprodutos'];
    $qntdeclientes = $dados['qntdeclientes'];
} else {
    echo "Nenhum resultado encontrado.";
}

$sql = "SELECT * FROM admin WHERE id = 1";
$resultt = $conn->query($sql);

if ($resultt->num_rows == 1) {
  $dados = $resultt->fetch_assoc();
  $nomeLogin = ucfirst(strtolower($dados['login']));

} else {
  echo "Nenhum resultado encontrado.";
}

// Consulta para buscar as notificações
$query = "SELECT titulo, icone, mensagem FROM notificacoes ORDER BY id DESC";
$resultado = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Painel Admin - TriunfoStore</title>
    
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.php"><img src="../assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="../assets/img/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="../assets/images/faces/face15.jpg" alt="">
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
            <a class="nav-link" href="">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/vendas.php">
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
                    <li class="nav-item">
                        <a class="nav-link" href="pages/cupom.php">Listar Cupom</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/addcupom.php">Adicionar novo cupom</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/usuarios.php">
                <span class="menu-icon">
                    <i class="mdi mdi-account-box"></i>
                </span>
                <span class="menu-title">Usuarios</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#u" aria-expanded="false" aria-controls="u">
                <span class="menu-icon">
                    <i class="mdi mdi-message-reply-text"></i>
                </span>
                <span class="menu-title">Comentarios</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="u">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/comentarios.php">Gerenciar comentarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/addcomentario.php">Adicionar comentario</a>
                    </li>
                </ul>
            </div>
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
                    <li class="nav-item">
                        <a class="nav-link" href="pages/listarprodutos.php">Gerenciar produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/adicionarproduto.php">Adicionar novo produto</a>
                    </li>
                    
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui" aria-expanded="false" aria-controls="ui">
                <span class="menu-icon">
                    <i class="mdi mdi-bank"></i>
                </span>
                <span class="menu-title">Pagamentos</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/pagamentos.php">Analytics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/pix.php">Pix</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/moderadores.php">
                <span class="menu-icon">
                    <i class="mdi mdi-desktop-mac"></i>
                </span>
                <span class="menu-title">Moderadores</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/config.php">
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
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
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
                    <img class="img-xs rounded-circle" src="../assets/images/faces/face15.jpg" alt="">
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
              <h3 class="page-title"> Analytics </h3>
             
            </div>

            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $qntdepedidos; ?></h3>
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
                          <h3 class="mb-0"><?php echo $qntdeVendas; ?></h3>
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
                          <h3 class="mb-0"><?php echo $qntdeprodutos; ?></h3>
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
                          <h3 class="mb-0"><?php echo $qntdeclientes; ?></h3>
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
            
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Total de vendas</h4>
                    <canvas id="barChart" style="height:230px"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Total de visitas</h4>
                    <canvas id="areaChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
            </div>


          </div>
        
        </div>
        
      </div>
     
    </div>
    
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>

    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
  
    <script src="../assets/js/chart.js"></script>
    
  </body>
</html>