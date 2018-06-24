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
                <div id="StaffArea" class="col-xl-4 col-lg-4 col-md-5 col-sm-8 order-md-2 order-sm-1 col bg-light sub-header d-flex align-items-center justify-content-end border-bottom border-dark p-0 pr-3">
                    <ul class="list-inline m-0">
                        <li class="list-inline-item mr-1">
                            <span class="badge badge-pill badge-danger badge-alert fa-xs">0</span>
                            <div class="btn btn-staff btn-mini rounded-circle p-0 pt-1" id="notifyMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                        
                                <span class="fas fa-exclamation-triangle"></span>
                            </div>
                            <div class="dropdown-menu" aria-labelledby="notifyMenu">
                                <ul class="list-unstyled">
                                    <li class="list-group-item bg-danger text-white p-0">
                                        ...
                                    </li>
                                    <li class="list-group-item bg-light text-dark p-0">
                                        ...
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="list-inline-item mr-2" id="myMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="btn btn-staff btn-mini rounded-circle p-0 pt-1" >
                                <span class="fas fa-user" ></span>
                            </div>                         
                            <span class="d-none d-lg-inline d-sm-inline fa-sm" style="position: relative;top: 2px;">Olá, <?php echo $viewData['staff_name']; ?></span>                            
                        </li>
                        <div class="dropdown-menu" aria-labelledby="myMenu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
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
            <div class="row border-bottom border-dark ">
                <div class="col breadcrumb-search d-md-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 m-md-0 mt-2 p-0 pl-1">
                            <li class="breadcrumb-item d-sm-inline-block " style="padding-left: 0px;">
                                <a class="btn btn-link px-1" href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item d-sm-inline-block" style="padding-left: 0px;">
                                <a class="btn btn-link px-1" href="#">Library</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page" style="padding-left: 0px;">
                                <a class="btn btn-link px-1" href="#">Data</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-7 breadcrumb-search d-flex align-items-center justify-content-end m-0">                    
                    <form method="POST" class="form-inline" role="form">                            
                        <input type="text" class="form-control-sm search-input mr-1" name="fastSearch" placeholder="Pesquisar"/>                            
                        <button type="submit" class="btn btn-sm btn-info"><span class="fas fa-search"></span></button>                            
                    </form>                                      
                </div>
            </div>
            <div class="row bg-info main-content">

                <?php
                $this->loadViewInTemplate($viewName, $viewData);
                ?>    
            </div>
            <div class="fixed-bottom bg-dark text-white">...</br>...</div>


        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    </body>
</html>
