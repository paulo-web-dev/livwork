<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/osen/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Nov 2024 22:09:26 GMT -->
<head>
    <meta charset="utf-8" />
    <title>LivWork Coworkings </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Gestão de Coworkings Desenvolvido por Plataforma Um" name="description" />
    <meta content="Plataforma Um" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="{{url('assets/js/config.js')}}"></script>

    <!-- Vendor css -->
    <link href="{{url('assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{url('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        
        <!-- Sidenav Menu Start -->
        <div class="sidenav-menu">

            <!-- Brand Logo -->
            <a href="index.html" class="logo">
                <span class="logo-light">
                    <span class="logo-lg"><img src="https://livwork.conexa.app/logo_empresa/7563ded7eb21972006bf6ba639bba51a.png" alt="logo"></span>
                    <span class="logo-sm"><img src="https://livwork.conexa.app/logo_empresa/7563ded7eb21972006bf6ba639bba51a.png" alt="small logo"></span>
                </span>

                <span class="logo-dark">
                    <span class="logo-lg"><img src="https://livwork.conexa.app/logo_empresa/7563ded7eb21972006bf6ba639bba51a.png" alt="dark logo"></span>
                    <span class="logo-sm"><img src="https://livwork.conexa.app/logo_empresa/7563ded7eb21972006bf6ba639bba51a.png" alt="small logo"></span>
                </span>
            </a>

            <!-- Sidebar Hover Menu Toggle Button -->
            <button class="button-sm-hover">
                <i class="ti ti-circle align-middle"></i>
            </button>

            <!-- Full Sidebar Menu Close Button -->
            <button class="button-close-fullsidebar">
                <i class="ti ti-x align-middle"></i>
            </button>

            <div data-simplebar>

                <!--- Sidenav Menu -->
                <ul class="side-nav">
                   

                    <li class="side-nav-item">
                        <a href="{{route('adm-home')}}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                            <span class="menu-text"> Início </span>
                            <span class="badge bg-success rounded-pill">5</span>
                        </a>
                    </li>
                    
                    <li class="side-nav-item">
                        <a href="{{route('adm-listar-reservas')}}" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-calendar"></i></span>
                            <span class="menu-text"> Reservas </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarHospital" aria-expanded="false" aria-controls="sidebarHospital" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-building-hospital"></i></span>
                            <span class="menu-text"> Unidades</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarHospital">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="{{route('adm-form-unidades')}}" class="side-nav-link">
                                        <span class="menu-text">Cadastrar Unidade</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{route('adm-listar-unidades')}}" class="side-nav-link">
                                        <span class="menu-text">Ver Unidades</span>
                                    </a>
                                </li>
                             
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-inbox"></i></span>
                            <span class="menu-text"> Salas </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="{{route('adm-form-salas')}}" class="side-nav-link">
                                        <span class="menu-text">Cadastrar Sala</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{route('adm-listar-salas')}}" class="side-nav-link">
                                        <span class="menu-text">Ver Salas</span>
                                    </a>
                                </li>
                             
                            </ul>
                        </div>
                    </li>

                    
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-basket"></i></span>
                            <span class="menu-text"> Clientes </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="{{route('adm-form-clientes')}}" class="side-nav-link">
                                        <span class="menu-text">Cadastrar Cliente</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{route('adm-listar-clientes')}}" class="side-nav-link">
                                        <span class="menu-text">Ver Clientes</span>
                                    </a>
                                </li>
                             
                            </ul>
                        </div>
                    </li>


            

                   

               
                    </li>

                   
                  
                </ul>

                <!-- Help Box -->
              
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Sidenav Menu End -->
        

      <header class="app-topbar">
    <div class="page-container topbar-menu">
        <div class="d-flex align-items-center gap-2 w-100">

            <!-- Brand Logo -->
            <a href="index.html" class="logo">
                <span class="logo-light">
                    <span class="logo-lg"><img src="https://livwork.conexa.app/logo_empresa/7563ded7eb21972006bf6ba639bba51a.png" alt="logo"></span>
                    <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
                </span>

                <span class="logo-dark">
                    <span class="logo-lg"><img src="https://livwork.conexa.app/logo_empresa/7563ded7eb21972006bf6ba639bba51a.png" alt="dark logo"></span>
                    <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
                </span>
            </a>

            <!-- Sidebar Menu Toggle Button -->
            <button class="sidenav-toggle-button px-2">
                <i class="ti ti-menu-deep fs-24"></i>
            </button>

            <!-- Horizontal Menu Toggle Button -->
            <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="ti ti-menu-deep fs-22"></i>
            </button>

            <!-- Alinhar para a direita -->
            <div class="d-flex align-items-center ms-auto gap-2">

                <!-- Light/Dark Mode Button -->
                <div class="topbar-item d-none d-sm-flex">
                    <button class="topbar-link" id="light-dark-mode" type="button">
                        <i class="ti ti-moon fs-22"></i>
                    </button>
                </div>

                <!-- User Dropdown -->
                <div class="topbar-item nav-user">
                    <div class="dropdown">
                        <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" data-bs-offset="0,19" type="button" aria-haspopup="false" aria-expanded="false">
                            <img src="https://media.istockphoto.com/id/1495088043/pt/vetorial/user-profile-icon-avatar-or-person-icon-profile-picture-portrait-symbol-default-portrait.jpg?s=612x612&w=0&k=20&c=S7d8ImMSfoLBMCaEJOffTVua003OAl2xUnzOsuKIwek=" width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                            <span class="d-lg-flex flex-column gap-1 d-none">
                                <h5 class="my-0">{{Auth::user()->name}}</h5>
                                <h6 class="my-0 fw-normal">Premium</h6>
                            </span>
                            <i class="ti ti-chevron-down d-none d-lg-block align-middle ms-2"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Bem Vindo !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="ti ti-user-hexagon me-1 fs-17 align-middle"></i>
                                <span class="align-middle">Meus Dados</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="ti ti-settings me-1 fs-17 align-middle"></i>
                                <span class="align-middle">Modificar Senha</span>
                            </a>

                            <!-- item-->
                            <a href="{{route('logout')}}" class="dropdown-item active fw-semibold text-danger">
                                <i class="ti ti-logout me-1 fs-17 align-middle"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

        <!-- Topbar End -->
