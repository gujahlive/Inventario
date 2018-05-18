<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<!-- start: HEAD -->
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
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
					<center><img src="../../imagens/logo/logo.png"></center>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">
					<form class="form-register" action="../../php/autentificacao/cadastro.php" method="POST">
						<input type="hidden" name="redirect" value="cadastro">
						<fieldset>
							<legend>
								Cadastre-se
							</legend>
							<p>
								Informe Seus Dados:
							</p>
							<div class="form-group">
								<label for="nome_cliente">Nome</label>
								<input type="text" required class="form-control" name="nome" placeholder="Nome Completo">
							</div>
							<div class="form-group">
								<label for="cpf">CPF</label>

								<input required type="text" class="form-control" name="cpf" placeholder="CPF" id="cpf">
								<span id="resposta" class="text-danger"></span>

							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="telefone_celular">Telefone celular</label>
										<input type="text" class="form-control" name="telefone_celular" placeholder="Telefone celular" id="telefone_celular">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="telefone_celular">Telefone residencial</label>
										<input type="text" class="form-control" name="telefone_residencial" placeholder="Telefone residencial" id="telefone_residencial">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="cep">CEP</label>
								<input type="text" class="form-control" name="cep" onblur="requestCep()" id="cep" placeholder="CEP">
								<p id="mensagemErro" class="text-danger"></p>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="rua">Rua</label>
										<input type="text" class="form-control" name="rua" id="rua" placeholder="Rua">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="bairro">Bairro</label>
										<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="numero">Número</label>
										<input required type="text" class="form-control" name="numero" placeholder="Número">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="complemento">Complemento</label>
										<input type="text" class="form-control" name="complemento" placeholder="Complemento">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="cidade">Cidade</label>
										<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="estado">Estado</label>
										<input type="text" class="form-control" name="estado" id="estado" placeholder="Estado">
										<input type="hidden" name="latitude" id="latitude" >
										<input type="hidden" name="longitude" id="longitude">
									</div>
								</div>
							</div>
							<p>
								Insira o Email e a Senha:
							</p>
							<div class="form-group">
								<label for="email">Email</label>
								<span class="input-icon">
									<input type="email" class="form-control" name="email" placeholder="E-mail">
									<i class="fa fa-envelope"></i> </span>
							</div>
							<div class="form-group">
								<label for="semha">Senha</label>
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="senha" placeholder="Senha">
									<i class="fa fa-lock"></i>
								</span>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary pull-right">
									Enviar <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="text-left">
								<p>
									Já tem uma conta?
									<a href="./login.php">
										Entrar
									</a>
								</p>
							</div>
						</fieldset>
					</form>
					<!-- start: COPYRIGHT -->
					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> PFC</span>.<span> Todos os direitos reservados</span>
					</div>
					<!-- end: COPYRIGHT -->
				</div>
				<!-- end: REGISTER BOX -->
			</div>
		</div>
		<!-- end: REGISTRATION -->
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="../../vendor/jquery/jquery.min.js"></script>
		<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../../vendor/modernizr/modernizr.js"></script>
		<script src="../../vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../../vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="../../vendor/jquery-validation/jquery.validate.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="../../vendor/maskedinput/jquery.maskedinput.min.js"></script>

		<script src="../../assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="../../assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
				$('#mensagemErro').hide();
			});

			$("#telefone_celular").mask("(99) 9 9999-9999");
			$("#telefone_residencial").mask("(99) 9999-9999");
			$("#cpf").mask("999.999.999-99");
			$("#cep").mask("99999-999");

			function requestCep(){
				$.ajax({
					method: 'get',
					url: 'http://maps.google.com/maps/api/geocode/json?address=' + $('#cep').val() + '&sensor=false',
					success: function(retorno){
						var resultado = retorno.results[0];

            if(resultado) {
              $('#bairro').val(resultado.address_components[1].long_name);
              $('#cidade').val(resultado.address_components[2].long_name);
              $('#estado').val(resultado.address_components[3].long_name);
              $('#cidade').val(resultado.address_components[2].long_name);
              $('#latitude').val(resultado.geometry.location.lat);
              $('#longitude').val(resultado.geometry.location.lng);
							$('#mensagemErro').hide();
            } else {
							$('#mensagemErro').show();
							$('#mensagemErro').text('CEP informado não encontrado!');
						}
					}
				});
			}
		</script>
			<script src="../../assets/js/validacpf.js"></script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
	<!-- end: BODY -->
</html>
