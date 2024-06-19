<?php 
session_start();

include('../../../src/settings/conexao.php');

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
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notificações</h6>
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
                  <p class="p-3 mb-0 text-center">Veja as notificações</p>
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
                        <input type="text" class="form-control" id="exampleInputMarca3" placeholder="Nome" value="Nome">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputAtual4">Valor</label>
                        <input type="text" class="form-control" id="exampleInputAtual4" placeholder="Valor" value="Valor">
                      </div>
                     
                      

                  </fieldset>
                  <div>

                      <label for="exampleInputPix4">Formas de Pagamento</label>
                    <div class="form-check form-switch">
                      
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">ACEITAR CARTÃO</label>
                    </div>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">ACEITAR PIX</label>
                    </div>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">ACEITAR BOLETO</label>
                    </div>
                    
                  </div>
                     
                  <div class="row">
<div class="col-12 grid-margin stretch-card">
             
  <div class="carder">
      <span>Imagem 1</span>
    <img src="https://imgs.casasbahia.com.br/55060824/1g.jpg?imwidth=384" alt="Imagem 1">
    
  </div>
  <div class="carder">
      <span>Imagem 2</span>
    <img src="https://imgs.casasbahia.com.br/55060824/2g.jpg?imwidth=384" alt="Imagem 2">
    
  </div>
  <div class="carder">
      <span>Imagem 3</span>
    <img src="https://imgs.casasbahia.com.br/55060824/1g.jpg?imwidth=384" alt="Imagem 3">
    
  </div>
  <div class="carder">
      <span>Imagem 4</span>
    <img src="https://imgs.casasbahia.com.br/55060824/2g.jpg?imwidth=384" alt="Imagem 4">
  </div>
  <div class="carder">
  <form class="file-upload-form">
  <label for="file" class="file-upload-label">
    <div class="file-upload-design">
      <svg viewBox="0 0 640 512" height="1em">
        <path
          d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"
        ></path>
      </svg>
      <p>Drag and Drop</p>
      <p>or</p>
      <span class="browse-button">Browse file</span>
    </div>
    <input id="file" type="file" />
  </label>
</form>
</div>

</div>

</div>

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
                            <th>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                <i class="input-helper"></i></label>
                              </div>
                            </th>
                            <th> N° Imagem </th>
                            <th> Config </th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php
  if ($result->num_rows > 0) {
    
    while ($linha = $result->fetch_assoc()) {
        
        $imagem = $linha["imagem"];
        $caminho  = $linha["caminho"];
        

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
        echo '<td>' . $imagem . '</td>'; 
        echo '<td>' . $caminho . '</td>';
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