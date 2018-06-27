<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/fontawesome-all.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
        <title>UP Ticket</title>
    </head>
    <body>
        <div class="container-fluid">
            <div id="Header" class="row header">
                <div id="Logo" class="col-xl-2 col-lg-2 col-md-2 col-sm-4 order-md-0 order-sm-0 col-12 bg-light text-dark sub-header d-flex align-items-center justify-content-sm-start justify-content-center border-bottom border-dark p-0 pl-2">
                    <div class="media align-items-center">
                        <img class="img-fluid mr-0 logo pb-2" src="<?php echo BASE_URL; ?>assets/imgs/logo.jpg">
                        <div class="media-body">
                            <span class="h5 font-weight-bold">Desk</span>
                        </div>
                    </div>
                </div>
                <div id="Navbar" class="col-xl col-lg col-md col-sm-12 order-md-1 order-sm-2 col-3 bg-light sub-header d-flex align-items-center border-bottom border-dark p-0 pl-3">
                    <nav class="navbar navbar-expand-sm navbar-light bg-light p-0 rounded" >
                        <button class="btn btn-staff border-dark navbar-toggler" style="height: 31px;padding-top: 1px;" type="button" data-toggle="collapse" data-target="#navbarCollapsed" aria-controls="navbarCollapsed" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="btn-sm navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav mr-0">
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?php echo BASE_URL; ?>">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Tickets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#">Tarefas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-nowrap" href="#">UP Wiki</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div id="StaffArea" class="col-xl-4 col-lg-5 col-md-5 col-sm-8 order-md-2 order-sm-1 col bg-light sub-header d-flex align-items-center justify-content-end border-bottom border-dark p-0 pr-3">
                    <ul class="list-inline m-0">
                        <li class="list-inline-item mr-1">
                            <span class="badge badge-pill badge-danger badge-alert fa-xs">0</span>
                            <div class="btn btn-staff btn-mini rounded-circle p-0 pt-1" data-toggle="collapse" data-target="#notifyMenu" aria-haspopup="true" aria-expanded="false">
                                <span class="fas fa-exclamation-triangle" ></span>
                            </div>
                            <div class="collapse dropdown-menu2 bg-light" id="notifyMenu" aria-labelledby="notifyMenu">
                                <div class="dropdown-header bg-danger rounded-top text-white fa-sm">
                                    0 Notificações
                                </div>
                                <div class="dropdown-item fa-sm">
                                    <span class="far fa-check-square fa-sm pr-1"></span>Não existem notificações pendentes
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item mr-2">
                            <div class="dropdown d-inline-block">
                                <div class="btn-group" data-toggle="collapse" data-target="#staffMenu" aria-haspopup="true" aria-expanded="false">
                                    <button id="BtnStaff" class="btn btn-staff btn-mini rounded-circle p-0">
                                        <span class="fas fa-user" style="padding-bottom: 4px;"></span>
                                    </button>
                                    <span class="d-none d-lg-inline d-md-none d-sm-inline fa-sm welcome-staff" >
                                        Olá, <?php echo $viewData['staff_name']; ?>
                                    </span>
                                </div>
                                <div class="collapse staff-menu" id="staffMenu" aria-labelledby="staffMenu">
                                    <a class="dropdown-item fa-sm" href="#"><span class="fa fa-edit fa-sm pr-1"></span>Detalhes da conta</a>
                                    <a class="dropdown-item fa-sm" href="#"><span class="fa fa-exclamation-triangle fa-sm pr-1"></span>Notificações</a>
                                    <a class="dropdown-item fa-sm" href="#"><span class="fa fa-cog fa-sm pr-1"></span>Configurações</a>
                                    <a class="dropdown-item fa-sm" href="#"><span class="fa fa-sign-out fa-sm pr-1"></span>Sair</a>
                                </div>
                            </div>
                        </li>

                        <li class="list-inline-item">
                            <a class="btn btn-staff btn-sm border-dark text-nowrap" href="#">Painel Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col collapse navbar-dark bg-dark border-bottom border-dark d-sm-none" id="navbarCollapsed">
                    <ul class="navbar-nav mx-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tickets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tarefas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">UP-Wiki</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row bg-light main-content">

                <div class="container-fluid">
                    <div class="row breadcrumb-search border-bottom border-dark ">
                        <div class="col d-flex align-items-center border-right border-dark">
                            <nav class="d-none d-md-block" aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0 pl-1">
                                    <li class="breadcrumb-item d-sm-inline-block active" style="padding-left: 0px;">
                                        <a class="btn btn-link px-1" href="#">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item " style="padding-left: 0px;">
                                        <a class="btn btn-link px-1" href="#">Library</a>
                                    </li>
                                    <li class="breadcrumb-item " aria-current="page" style="padding-left: 0px;">
                                        <a class="btn btn-link px-1 " href="#">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                            <nav class="d-md-none">
                                <div class="dropdown drop-ticket">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="FastMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tickets Pendentes
                                    </button>
                                    <div class="dropdown-menu fastmenu bg-light pt-3" aria-labelledby="FastMenu">

                                        <span class="dropdown-header fa-lg">
                                            TICKETS
                                        </span>
                                        <hr class="blurred">
                                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                            <span class="drop-item">Seus Tickets</span>
                                            <span class="badge badge-blue badge-pill">1</span>
                                        </a>
                                        <a class="dropdown-item d-flex justify-content-between align-items-center active" href="#">
                                            <span class="drop-item">Seus Tickets</span>
                                            <span class="badge badge-blue badge-pill">1</span>
                                        </a>
                                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                            <span class="drop-item">Seus Tickets</span>
                                            <span class="badge badge-blue badge-pill">1</span>
                                        </a>
                                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                            <span class="drop-item">Seus Tickets</span>
                                            <span class="badge badge-blue badge-pill">1</span>
                                        </a>
                                        <hr class="blurred">
                                        <span class="dropdown-header fa-lg">
                                            TAREFAS
                                        </span>
                                        <hr class="blurred">
                                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                            <span class="drop-item">Seus Tickets</span>
                                            <span class="badge badge-blue badge-pill">1</span>
                                        </a>
                                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                            <span class="drop-item">Seus Tickets</span>
                                            <span class="badge badge-blue badge-pill">1</span>
                                        </a>
                                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                            <span class="drop-item">Seus Tickets</span>
                                            <span class="badge badge-blue badge-pill">1</span>
                                        </a>
                                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                            <span class="drop-item">Seus Tickets</span>
                                            <span class="badge badge-blue badge-pill">1</span>
                                        </a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-end pl-0"
                             <form method="POST" class="search-form form-inline justify-content-end" role="form" style="width: 200px;">
                                <div class="form-group m-0 collapse width" id="SearchArea" aria-labelledby="SearchArea">
                                    <div class="d-flex d-inline-block">
                                        <input type="text" class="form-control SearchInput form-control-sm mr-1 " name="fastSearch" placeholder="Pesquisar"/>
                                        <button type="submit" class="btn btn-sm btn-search">
                                            <span class="fas fa-search"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="btn btn-sm btn-search p-0 m-0 d-flex align-items-center justify-content-center open-form" data-toggle="collapse" data-target="#SearchArea"  aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-search"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row tiled-area mt-3">
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <div class="dash-tile dash-tile-blue d-flex align-items-center justify-content-center">
                                <div class="tile-icon">
                                    <i class="far fa-inbox-in"></i>
                                </div>
                                <div class="tile-content pb-4">
                                    <div class="tile-info">
                                        0
                                    </div>
                                    <span class="tile-text">
                                        Tickets Novos
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <div class="dash-tile dash-tile-red d-flex align-items-center justify-content-center">
                                <div class="tile-icon">
                                    <i class="far fa-inbox" style="font-size: 4.9rem; top: 0.8rem;"></i>
                                </div>
                                <div class="tile-content pb-4">
                                    <div class="tile-info">
                                        0
                                    </div>
                                    <span class="tile-text">
                                        Tickets Pendentes
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <div class="dash-tile dash-tile-violet d-flex align-items-center justify-content-center">
                                <div class="tile-icon">
                                    <i class="far fa-list-ul"></i>
                                </div>
                                <div class="tile-content pb-4">
                                    <div class="tile-info">
                                        0
                                    </div>
                                    <span class="tile-text">
                                        Tarefas Novas
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <div class="dash-tile dash-tile-magenta d-flex align-items-center justify-content-center">
                                <div class="tile-icon">
                                    <i class="far fa-tasks"></i>
                                </div>
                                <div class="tile-content pb-4">
                                    <div class="tile-info">
                                        0
                                    </div>
                                    <span class="tile-text">
                                        Tarefas Pendentes
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ticket-area" >
                        <div class="col-lg-3 col-md-4 d-md-block d-none">
                            <div class="fastmenu bg-light">
                                <hr class="blurred">
                                <span class="dropdown-header fa-lg">
                                    TICKETS
                                </span>
                                <hr class="blurred">
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                    <span class="drop-item">Seus Tickets</span>
                                    <span class="badge badge-blue badge-pill">1</span>
                                </a>
                                <a class="dropdown-item d-flex justify-content-between align-items-center active" href="#">
                                    <span class="drop-item">Seus Tickets</span>
                                    <span class="badge badge-blue badge-pill">1</span>
                                </a>
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                    <span class="drop-item">Seus Tickets</span>
                                    <span class="badge badge-blue badge-pill">1</span>
                                </a>
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                    <span class="drop-item">Seus Tickets</span>
                                    <span class="badge badge-blue badge-pill">1</span>
                                </a>
                                <hr class="blurred">
                                <span class="dropdown-header fa-lg">
                                    TAREFAS
                                </span>
                                <hr class="blurred">
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                    <span class="drop-item">Seus Tickets</span>
                                    <span class="badge badge-blue badge-pill">1</span>
                                </a>
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                    <span class="drop-item">Seus Tickets</span>
                                    <span class="badge badge-blue badge-pill">1</span>
                                </a>
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                    <span class="drop-item">Seus Tickets</span>
                                    <span class="badge badge-blue badge-pill">1</span>
                                </a>
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                    <span class="drop-item">Seus Tickets</span>
                                    <span class="badge badge-blue badge-pill">1</span>
                                </a>
                            </div>
                        </div>
                        <div class="col bg-primary">
                            <div class="container-fluid bg-dark px-0">
                                <?php
                                    $this->loadViewInTemplate($viewName, $viewData);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed-bottom bg-dark text-white">...</br>...</div>


        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
