<?php
session_start();

include('../../../src/settings/conexao.php');

$sql = "SELECT * FROM comentarios";
$result = $conn->query($sql);

$sql = "SELECT * FROM admin WHERE id = 1";
$resultt = $conn->query($sql);

if ($resultt->num_rows == 1) {
  
  $dados = $resultt->fetch_assoc();

  $nomeLogin = ucfirst(strtolower($dados['login']));

  


} else {
  echo "Nenhum resultado encontrado.";
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
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
          <a class="sidebar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
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
                <li class="nav-item"> <a class="nav-link" href="#">Analytics</a></li>
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
            <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
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
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-view-grid"></i>
                </a>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                      <p class="text-muted mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                      <p class="text-muted mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">4 new messages</p>
                </div>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Event today</p>
                      <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                      <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
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
              <h3 class="page-title"> Comentarios </h3>
              
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Listagem de comentarios</h4>
          
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                <i class="input-helper"></i></label>
                              </div>
                            </th>
                            <th> Imagem </th>
                            <th> Nome </th>
                            <th> Data </th>
                            <th> Hora </th>
                            <th> Texto </th>
                            <th> Config </th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php
  if ($result->num_rows > 0) {
    
    while ($linha = $result->fetch_assoc()) {
        
        $nome = $linha["nome"];
        $hora = $linha["hora"];
        $data = $linha["data"];
        $texto = $linha["texto"];      
        

        echo '<tr>';
        echo '<td>';
        echo '<div class="form-check form-check-muted m-0">';
        echo '<label class="form-check-label">';
        echo '<input type="checkbox" class="form-check-input">';
        echo '<i class="input-helper"></i></label>';
        echo '</div>';
        echo '</td>';
        echo '<td class="py-1">';
        echo '<img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />';
        echo '</td>';
        echo '<td>' . $nome . '</td>'; // Corrigido aqui
        echo '<td>' . $data . '</td>'; // Corrigido aqui
        echo '<td>' . $hora . '</td>'; // Corrigido aqui
        echo '<td>' . $texto . '</td>'; // Corrigido aqui
        echo '<td>';
        echo '<div class="table-actions">';
        echo '<a class="btn btn-sm btn-icon btn-primary" href="https://wowy.botble.com/admin/system/roles/edit/1" data-bs-toggle="tooltip" data-bs-original-title="Edit">';
        echo '<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="display: block; margin: 6px auto 0;">';
        echo '<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>';
        echo '<path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>';
        echo '<path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>';
        echo '<path d="M16 5l3 3"></path>';
        echo '</svg>';    
        echo '</a>';
        echo '<a class="btn btn-sm btn-icon btn-danger" href="https://wowy.botble.com/admin/system/roles/1" data-bs-toggle="tooltip" data-bs-original-title="Delete" data-dt-single-action="" data-method="DELETE" data-confirmation-modal="true" data-confirmation-modal-title="Confirm delete" data-confirmation-modal-message="Do you really want to delete this record?" data-confirmation-modal-button="Delete" data-confirmation-modal-cancel-button="Cancel">';
        echo '<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="display: block; margin: 6px auto 0;">';
        echo '<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>';
        echo '<path d="M4 7l16 0"></path>';
        echo '<path d="M10 11l0 6"></path>';
        echo '<path d="M14 11l0 6"></path>';
        echo '<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>';
        echo '<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>';
        echo '</svg>';    
        echo '</a>';
        echo '</div>';
        echo '</td>';
        echo '</tr>';
                                          
        
    }
  } else {
    echo "Nenhum comentário encontrado.";
  }


  ?>




                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>


              

              
            </div>
          </div>
          
        </div>
        
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