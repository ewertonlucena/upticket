<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />     
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css"/>    
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css"/>                    
        <title>Meu site</title>
    </head>
    <body>
        <div class="container-fluid">             
            <div class="row justify-content-center bg-dark">                    		
                <div class="col-xs-4 col-sm-9 col-md-7 col-lg-6 col-xl-4 bg-danger">
                    <?php if (isset($error) && !empty($error)): ?>
                        <div class="alert alert-danger alert-dismissible mx-4 mb-1">			 
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <div class="loginarea mt-2">
                        <form method="POST" role="form">
                            <div class="form-group">
                                <label>
                                    Login
                                </label>
                                <input type="text" class="form-control" name="login" placeholder="Digite seu nome de usuário" />
                            </div>
                            <div class="form-group">
                                <label>
                                    Senha
                                </label>
                                <input type="password" class="form-control" name="pass" placeholder="Digite sua senha" />
                            </div>	
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Entrar"/>
                            </div>
                        </form>
                    </div>
                </div>			
            </div>
        </div>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    </body>
</html>
