<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<!-- start: HEAD -->
  <?php
    require_once "../../conexao/Conexao.class.php";
    require_once "../../classes/Usuario.class.php";

    $id_usuario = $_GET['identificador'];
    $id_usuario = base64_decode($id_usuario);

  	$Usuario = Usuario::getInstance(Conexao::getInstance());
  	$usuario = $Usuario->pegarDados($id_usuario);
  ?>

	<head>
    <title>HPS - Serviços</title>
    <link href="../../assets/images/semfundo.png" rel="icon" type="image/x-icon" />

		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
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
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login">
		<!-- start: LOCK SCREEN -->
		<div class="row">
			<div class="lock-screen">
				<div class="box-ls">
					<img alt="" src="<?php echo $usuario->foto ?>" class="img-rounded" width="180"/>
					<div class="user-info">
						<span><?php echo $usuario->email; ?></span>
						<form action="../../php/autentificacao/redefinirSenha.php" method="POST">
							<div class="input-group">
                <input type="hidden" name="email" value="<?php echo $usuario->email ?>">
                <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario ?>">
								<input type="password" placeholder="Insira sua nova senha" class="form-control" name="senha" id="senha">
								<span class="input-group-btn">
                  <button type="button" onclick="togglePassword()" name="button" class="btn btn-primary">
                    <i class="fa fa-eye"></i>
                  </button>
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-chevron-right"></i>
									</button> </span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

    <script src="../../vendor/jquery/jquery.min.js"></script>

    <script type="text/javascript">
      let status = false
      function togglePassword() {
        if(!status) $('#senha').attr('type', 'text');
        else $('#senha').attr('type', 'password');

        status = !status
      }
    </script>
	</body>
	<!-- end: BODY -->
</html>
