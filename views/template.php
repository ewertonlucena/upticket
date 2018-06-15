<!DOCTYPE html>
<html>
    <head>
        <title>Meu site</title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    </head>
    <body>
        <h1>TOPO DO SITE</h1>
        <hr/>
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </body>
        
        
</html>
