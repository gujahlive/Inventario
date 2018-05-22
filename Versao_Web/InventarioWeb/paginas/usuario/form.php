<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->

<html lang="en">

	<body>
		<div id="app">
			<?php
					require_once "../../classes/Usuario.class.php";
					require_once "../utils/header.php";

					$Usuario = Usuario::getInstance(Conexao::getInstance());
					$usuario = [];
					if(isset($_GET["update"])){
						$usuario = $Usuario->pegarDados($_GET["update"]);
					} else {
						$usuario = (object) [
							'id_usuario' => '',
							'email' => ''
						];
					}
			?>

			<div class="app-content">
				<!-- start: TOP NAVBAR -->

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<div class="container-fluid container-fullw bg-white">
              <div class="panel panel-white">
								<div class="panel-heading">
									<h5 class="panel-title">Formulário de usuário</h5>
								</div>
								<div class="panel-body">
									<form role="form" action="../../php/usuario/cadastro.php" method="POST">
										<input type="hidden" class="form-control" name="id_usuario" value="<?php echo $usuario->id_usuario ?>">

										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
		                      <label for="email">
		                        Email
		                      </label>
		                      <input type="text" class="form-control" name="email" required value="<?php echo $usuario->email ?>">
		                    </div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
		                      <label for="senha">
		                        Senha
		                      </label>
		                      <input type="password" class="form-control" name="senha" required>
		                    </div>
											</div>
										</div>
										<?php if (empty($usuario->id_usuario)): ?>
											<div class="form-group">
												<label for="tipo_usuario">Tipo de usuário</label>
												<select class="form-control" name="tipo_usuario">
													<option value="administrador">Administrador</option>
												</select>
											</div>
										<?php endif; ?>
                    <div class="text-center">
	                    <button type="submit" class="btn btn-o btn-primary">
	                      Enviar
	                    </button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
      <footer>
				<div class="footer-inner">
					<div class="pull-left">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HPS - Serviços</span>
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="ti-angle-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->
		</div>

		<script>
       Maps.init();
		</script>
	</body>
</html>
