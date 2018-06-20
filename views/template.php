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
            <div class="row bg-danger header">
                <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 order-lg-0 order-sm-0 col-12 bg-light sub-header d-flex align-items-center justify-content-sm-start justify-content-center">
                    LOGO
                </div>
                <div class="col-xl col-lg col-md-12 col-sm-12 order-lg-1 order-sm-2 col-4 bg-warning sub-header d-flex align-items-center">
                    NAVBAR
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 order-lg-2 order-sm-1 col bg-primary sub-header d-flex align-items-center justify-content-end">
                    STAFF AREA
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 bg-success breadcrumb-search d-flex align-items-center">
                    <div>
                        BREADCRUMB
                    </div>                    
                </div>
                <div class="col-md-6 alert-danger breadcrumb-search d-flex align-items-center justify-content-end">                    
                        <form method="POST" class="form-inline" role="form">                            
                            <input type="text" class="form-control-sm mr-1" name="fastSearch" placeholder="Pesquisar"/>                            
                            <button type="submit" class="btn btn-sm btn-info"><span class="fas fa-search"></span></button>                            
                        </form>                                      
                </div>
            </div>
            <?php
                $this->loadViewInTemplate($viewName, $viewData);
            ?>

        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    </body>
</html>
