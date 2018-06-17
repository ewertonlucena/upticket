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
        <div class="container-fluid vertical-centered">                           
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
			<div class="col-md">
			</div>
                        <div class="col-md-4 loginarea">
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
			<div class="col-md">
			</div>
                    </div>
		</div>
            </div>
        </div>
    </body>
</html>
