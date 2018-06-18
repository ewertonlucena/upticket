<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />        
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css"/>        
        <title>Meu site</title>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 alert-danger">                 
                   Primeira
                </div>                
                <div class="col-md-6 col-lg-3 alert-light">
                    Segunda
                </div>               
                <div class="col-md-6 col-lg-3 bg-dark text-white">
                    terceira
                </div>
                <div class="col-md-6 col-lg-3 alert-primary">
                    <p class="text-muted"> quarta</p>
                </div>
            </div>
            <div class="row">
                <?php $this->loadViewInTemplate($viewName, $viewData); ?>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    </body>
        
        
</html>
