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
                <div id="Logo" class="col-xl-2 col-lg-2 col-md-3 col-sm-4 order-md-0 order-sm-0 col-12 bg-light sub-header d-flex align-items-center justify-content-sm-start justify-content-center border-bottom border-dark p-0 pl-2">
                    <div class="media align-items-end">
                        <img class="img-fluid mr-0 logo" src="<?php echo BASE_URL; ?>assets/imgs/logo.jpg">
                        <div class="media-body">
                            <span class="text-dark logo-text h4"><strong>Tickets</strong></span>
                        </div>
                    </div>
                </div>
                <div id="Navbar" class="col-xl col-lg col-md-5 col-sm-12 order-md-1 order-sm-2 col-3 bg-light sub-header d-flex align-items-center border-bottom border-dark p-0 pl-3">
                    <nav class="navbar navbar-expand-sm navbar-light bg-light p-0">                        
                        <button class="btn btn-staff border-dark navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="btn-sm navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav mr-0">
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
                                    <a class="nav-link" href="#">UP Wiki</a>
                                </li>
                            </ul>                            
                        </div>
                    </nav>
                </div>
                <div id="StaffArea" class="col-xl-4 col-lg-4 col-md-4 col-sm-8 order-md-2 order-sm-1 col bg-light sub-header d-flex align-items-center justify-content-end border-bottom border-dark p-0 pr-3">
                    <ul class="list-inline m-0">
                        <li class="list-inline-item mr-1">
                            <span class="badge badge-pill badge-danger badge-alert fa-xs">0</span>
                            <div class="btn btn-staff btn-mini rounded-circle p-0 pt-1" >                        
                                <span class="fas fa-exclamation-triangle"></span>
                            </div> 
                        </li>
                        <li class="list-inline-item mr-0">
                            <div class="btn btn-staff btn-mini rounded-circle p-0 pt-1" >
                                <span class="fas fa-user" ></span>
                            </div> 
                        </li>
                        <li class="list-inline-item">
                            <span class="d-none d-lg-inline d-md-none d-sm-inline text-truncate fa-sm">Olá, <?php echo $viewData['staff_name']; ?></span>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-staff btn-sm border-dark text-nowrap" href="#">Painel Admin</a>
                        </li>
                    </ul>                        
                </div>
            </div>
            <div class="row">
                <div class="col collapse navbar-light bg-light border-bottom border-dark d-sm-none" id="navbarsExample03">
                    <ul class="navbar-nav mr-0">
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
                            <a class="nav-link" href="#">UP Wiki</a>
                        </li>
                    </ul>                            
                </div>
            </div>            
            <div class="row">
                <div class="col-md-8 breadcrumb-search d-md-flex align-items-center d-none d-md-block">
                    <div>
                        BREADCRUMB
                    </div>                    
                </div>
                <div class="col-md-4 breadcrumb-search d-flex align-items-center justify-content-end no-gutters m-0">                    
                    <form method="POST" class="form-inline" role="form">                            
                        <input type="text" class="form-control-sm mr-1" name="fastSearch" placeholder="Pesquisar"/>                            
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
