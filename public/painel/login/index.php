<?php
session_start();
?>

<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="TriunfoCenter">
    <meta name="author" content="Triunfo">
    <title>Painel Admin - Login</title>
    <link rel="apple-touch-icon" href="painel/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="painel/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="painel/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="painel/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="painel/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="painel/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="painel/app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="painel/app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="painel/app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="painel/app-assets/css/themes/semi-dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="painel/app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="painel/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="painel/app-assets/css/pages/page-auth.min.css">
    <link rel="stylesheet" type="text/css" href="painel/assets/css/style.css">
    <script src="https://www.google.com/recaptcha/api.js?hl=pt-BR"></script>

    <!-- Estilos CSS do background SVG -->
    <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

*::before,
*::after {
    box-sizing: border-box;
}

html,
body {
    overscroll-behavior-x: none;
    overscroll-behavior-y: none;
    scroll-behavior: smooth;
}

body {
    font-family: "Asap", sans-serif;
    position: relative;
    width: 100vw;
    min-height: 100vh;
    text-align: center;
    overflow-x: hidden;
    background: black;
    color: white;
}

#bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-image: url('painel/assets/img/ogrito.jpg');
    background-size: cover;
    --origin: top 60% left 40%;
    background-position: var(--origin);
    transform-origin: center;
    transform: scale3d(1.3, 1.3, 1);
    filter: hue-rotate(var(--angle)) url(#noise);
}

@keyframes anim {
    0% {
        --angle: 0deg;
    }
    100% {
        --angle: 360deg;
    }
}

svg {
    position: fixed;
    top: 0;
    left: 0;
    width: 0;
    height: 0;
    z-index: -1;
}

main {
    position: relative;
}

section {
    position: relative;
    width: 100vw;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

h2 {
    font-size: 1.2rem;
}

#credit {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
}

a {
    color: white; /* Mantendo a cor original */
}

        </style>
</head>
<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
<div id='bg'></div> <!-- Background SVG Noise filter -->

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-v1 px-2">
                <div class="auth-inner py-2">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a class="brand-logo">
                            <svg viewbox="0 0 139 95"
                                 version="1.1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                 height="28"
                                 >
                                 <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                       <stop stop-color="#000000" offset="0%"></stop>
                                       <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                       <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                       <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                 </defs>
                                 <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                       <g id="Group" transform="translate(400.000000, 178.000000)">
                                          <path
                                             class="text-primary"
                                             id="Path"
                                             d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                             style="fill: currentColor"
                                             ></path>
                                          <path
                                             id="Path1"
                                             d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                             fill="url(#linearGradient-1)"
                                             opacity="0.2"
                                             ></path>
                                          <polygon
                                             id="Path-2"
                                             fill="#000000"
                                             opacity="0.049999997"
                                             points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"
                                             ></polygon>
                                          <polygon
                                             id="Path-21"
                                             fill="#000000"
                                             opacity="0.099999994"
                                             points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"
                                             ></polygon>
                                          <polygon
                                             id="Path-3"
                                             fill="url(#linearGradient-2)"
                                             opacity="0.099999994"
                                             points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"
                                             ></polygon>
                                             </g>
                                    </g>
                                 </g>
        <filter id='noise'>
            <feTurbulence type='fractalNoise' baseFrequency='0.03' numOctaves='1' seed='1'></feTurbulence>
            <feDisplacementMap xChannelSelector="B" yChannelSelector="G" scale="150" in="SourceGraphic">
                <animate attributeName="scale" dur="10s" values="150;0;-150;0;150" repeatCount="indefinite" />
            </feDisplacementMap>
        </filter>
    </svg>
    <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                                 <defs>
                                    <linearGradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                       <stop stop-color="#000000" offset="0%"></stop>
                                       <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </linearGradient>
                                    <linearGradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                       <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                       <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </linearGradient>
                                 </defs>
                                 <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                       <g id="Group" transform="translate(400.000000, 178.000000)">
                                          <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                          <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                          <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                          <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                          <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                       </g>
                                    </g>
                                 </g>
                              </svg>
                                <h2 class="brand-text text-primary ml-1">Triunfo Center</h2>
                            </a>
                            <h4 class="card-title mb-1"><strong>PAINEL ADMIN</strong></h4>
                            <p class="card-text mb-2">Bem vindo, preencha os seus dados <br>corretamente para fazer o login.</p>

                            <div class="p-30">
                                <?php if(isset($_SESSION["login_error"])) {
                                    echo $_SESSION["login_error"];
                                    unset($_SESSION["login_error"]);
                                } elseif(isset($_SESSION["login_success"])) {
                                    echo $_SESSION['login_success']; ?>
                                    <script>
                                        setTimeout(function() {
                                            window.location.href = 'painel/';
                                        }, 3500);
                                    </script>
                                    <?php unset($_SESSION["login_success"]);
                                } ?>
                                <form class="auth-login-form mt-2" action="valida.php" method="POST" class="form login">
                                    <div class="form-group">
                                        <?php 
                                        $token = rand(11111111111111,15111111111111);
                                        ?>
                                        <input type="hidden" id="token" name="token" value="<?php echo $token ?>">
                                        <label for="login-email" class="form-label">Usuário</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="email"
                                            name="usuario"
                                            placeholder="usuário"
                                            aria-describedby="email"
                                            tabindex="1"
                                            autofocus
                                        />
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">Senha</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input
                                                type="password"
                                                class="form-control form-control-merge"
                                                id="senha"
                                                name="senha"
                                                tabindex="2"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password"
                                            />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">Conectar</button>
                                    <p class="text-center mt-2">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../app-assets/js/src.js"></script>
<script src="painel/app-assets/vendors/js/vendors.min.js"></script>
<script src="painel/app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="painel/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="painel/app-assets/js/core/app-menu.min.js"></script>
<script src="painel/app-assets/js/core/app.min.js"></script>
<script src="painel/app-assets/js/scripts/pages/page-auth-login.js"></script>
<script>$(window).on('load',  function(){if (feather) {feather.replace({ width: 14, height: 14 });}})</script>
<script src="script.js"></script>
</body>
</html>
