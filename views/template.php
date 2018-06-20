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
                <div id="Logo" class="col-xl-2 col-lg-3 col-md-6 col-sm-6 order-lg-0 order-sm-0 col-12 bg-light sub-header d-flex align-items-center justify-content-sm-start justify-content-center">
                    <div style="max-height: 60px; width: 60px;">
                        <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/imgs/logo.jpg">
                    </div>
                </div>
                <div id="Navbar" class="col-xl col-lg col-md-12 col-sm-12 order-lg-1 order-sm-2 col-4 bg-light sub-header d-flex align-items-center">
                    NAVBAR
                </div>
                <div id="StaffArea" class="col-xl-3 col-lg-3 col-md-6 col-sm-6 order-lg-2 order-sm-1 col bg-light sub-header d-flex align-items-center justify-content-end">
                    Olá, <?php echo $viewData['staff_name'];?>
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
