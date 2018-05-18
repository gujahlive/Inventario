<!DOCTYPE html>

<html lang="pt_br">
	<head>
    <title>HPS - Serviços</title>
		<link href="../../assets/images/semfundo.png" rel="icon" type="image/x-icon" />

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: GOOGLE FONTS -->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<!-- end: GOOGLE FONTS -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../vendor/themify-icons/themify-icons.min.css">
		<link href="../../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<!-- end: MAIN CSS -->
		<!-- start: CLIP-TWO CSS -->
		<link rel="stylesheet" href="../../assets/css/styles.css">
		<link rel="stylesheet" href="../../assets/css/plugins.css">

		<!-- end: CLIP-TWO CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login">
		<!-- start: FORGOT -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="logo margin-top-20">
          <center><img src="../../imagens/logo/logo.png" ></center>
        </div>
				<!-- start: FORGOT BOX -->
				<div class="box-forgot">
					<form class="form-forgot" action="../../php/autentificacao/enviarToken.php" method="POST">
						<fieldset>
							<legend>
								Esqueceu a Senha?
							</legend>
							<p>
								Entre com seu endereço de e-mail para resgatar a senha!
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" placeholder="Email">
									<i class="fa fa-envelope-o"></i> </span>
							</div>
							<?php if (isset($_GET['status']) && $_GET['status']): ?>
								<small class="text-success">Email enviado com sucesso!</small>
							<?php endif; ?>
							<div class="form-actions">
								<a class="btn btn-primary btn-o" href="login.php">
									<i class="fa fa-chevron-circle-left"></i> Voltar
								</a>
								<button type="submit" class="btn btn-primary pull-right">
									Enviar <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>
					<!-- start: COPYRIGHT -->
					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> PFC </span>. <span>All rights reserved</span>
					</div>
					<!-- end: COPYRIGHT -->
				</div>
				<!-- end: FORGOT BOX -->

	</body>
	<!-- end: BODY -->
</html>
