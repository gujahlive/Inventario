<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->

	<body>
		<div id="app">
			<?php
				require_once "../utils/importsUx.php";
				require_once "../../classes/Usuario.class.php";
				require_once "../../classes/Cliente.class.php";
				require_once "../../classes/Endereco.class.php";
				session_start();

				$usuario = Usuario::getInstance(Conexao::getInstance())->pegarDados($_SESSION['id_usuario']);
				if(!empty($_SESSION["id_cliente"])){
					$cliente = Cliente::getInstance(Conexao::getInstance())->pegarDados($_SESSION['id_cliente']);
				}
			?>

			<div class="app-content">

				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Perfil de usuário</h1>
								</div>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: USER PROFILE -->
						<div class="container-fluid container-fullw bg-white">
							<?php if (isset($_GET["status"]) && $_GET["status"]): ?>
								<div class="alert alert-success" id="contactSuccess">
									<strong>Sucesso!</strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
									<p>
										Suas informações foram alteradas com sucesso!
									</p>
								</div>
							<?php endif; ?>
							<?php if (isset($_GET["status"]) && empty($_GET["status"])): ?>
								<div class="alert alert-danger" id="contactError">
									<strong>Erro!</strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
									<p>
										Ocorreu um erro ao alterar suas informações.
									</p>
								</div>
							<?php endif; ?>
							<div class="row">
								<div class="col-md-12">
									<?php if (!empty($cliente)): ?>
									<fieldset>
										<legend>
											Informações da conta
										</legend>
										<form action="../../php/cliente/atualizar.php" method="post" role="form" id="form">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="nome_cliente">
															Nome
														</label>
														<input type="text" class="form-control" id="firstname" name="nome_cliente" value="<?php echo $cliente->nome_cliente ?>">
													</div>

													<div class="form-group">
														<label class="cpf">
															CPF
														</label>
														<input type="text" id="cpf" class="form-control" name="cpf" value="<?php echo $cliente->cpf ?>">
													</div>

													<div class="row">
													  <div class="col-sm-6">
	                            <div class="form-group">
	    													<label class="control-label">
	    														Telefone residencial
	    													</label>
	    													<input type="text" class="form-control" id="telefone_residencial" name="telefone_residencial" value="<?php echo $cliente->telefone_residencial ?>">
	    												</div>
													  </div>
													  <div class="col-sm-6">
	                            <div class="form-group">
	    													<label class="control-label">
	    														Telefone celular
	    													</label>
	    													<input type="text" id="telefone_celular" class="form-control" name="telefone_celular" value="<?php echo $cliente->telefone_celular ?>">
	    												</div>
													  </div>
													</div>
													<div class="pull-right">
														<button class="btn btn-primary pull-right" type="submit">
															Atualizar <i class="fa fa-arrow-circle-right"></i>
														</button>
													</div>

												</div>
												<div class="col-sm-6">
													<center>
														<button type="button" class="btn btn-o btn-primary" name="button" data-target="#formEndereco" data-toggle="modal">
															Adicionar endereço
														</button>
													</center>
													<br>
													<div id="enderecos">

													</div>
												</div>
											</div>
										</form>
									</fieldset>
									<?php endif; ?>
									<fieldset>
										<legend>
											Informação Adicional
										</legend>
										<form action="../../php/usuario/atualizar.php" method="POST" enctype="multipart/form-data">
                      <div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>
															Envio de imagem
														</label>
														<center>
															<div class="fileinput fileinput-new" data-provides="fileinput">
																<div class="fileinput-new thumbnail"><img src="<?php echo $usuario->foto ?>" id="preview" width="200" height="200">
																</div>
																<div class="user-edit-image-buttons">
																	<span class="btn btn-azure btn-file">
																		<span class="fileinput-new">
																			<i class="fa fa-picture"></i> Selecione uma imagem
																		</span>
																		<input type="file" id="input-imagem" name="foto">
																	</span>
																	<button type="button" name="button" class="btn btn-red" onclick="removeImagem()">
																		<i class="fa fa-times"></i> Remover
																	</button>
																</div>
															</div>
														</center>
													</div>
												</div>
  											<div class="col-md-6">
  												<div class="form-group">
  													<div class="form-group">
                              <label class="control-label">
                                Endereço de e-mail
                              </label>
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario->email ?>" required>
                            </div>
                            <div class="form-group">
                              <label class="control-label">
                                Senha
                              </label>
                              <input type="password" class="form-control" name="senha" id="password">
                            </div>
  												</div>
  											</div>
  										</div>
                      <div class="pull-right">
                        <button class="btn btn-primary pull-right" type="submit">
                          Atualizar <i class="fa fa-arrow-circle-right"></i>
                        </button>
                      </div>
										</form>
									</fieldset>
								</div>
							</div>
						</div>
						<!-- end: USER PROFILE -->
					</div>
				</div>
				<?php
					require_once "../utils/footer.php";
				?>
			</div>

			<div class="modal fade bs-example-modal-lg"  tabindex="-1" role="dialog" id="formEndereco" aria-hidden="true">
				<div class="modal-dialog modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">Cadastrar endereço</h4>
						</div>

						<div class="modal-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="cep">
											CEP
										</label>
										<input type="text" class="form-control cep" placeholder="CEP" onchange="requestCep()" name="cep" id="cep">
										<input type="hidden" name="latitude" class="latitude">
										<input type="hidden" name="longitude" class="longitude">
									</div>
									<div class="form-group">
										<label for="bairro">
											Bairro
										</label>
										<input type="text" class="form-control bairro" placeholder="Bairro" name="bairro">
									</div>

									<div class="form-group">
										<label for="rua">
											Rua
										</label>
										<input type="text" class="form-control rua" placeholder="Rua" name="rua">
									</div>
								</div>

								<div class="col-sm-6">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="numero">
													Número
												</label>
												<input type="text" class="form-control" placeholder="Número" name="numero" id="numero">
											</div>
										</div>

										<div class="col-sm-6">
											<div class="form-group">
												<label for="complemento">
													Complemento
												</label>
												<input type="text" class="form-control complemento" placeholder="Complemento" name="complemento" >
											</div>
										</div>
									</div>

									<div class="form-group">
										<label for="cidade">
											Cidade
										</label>
										<input type="text" class="form-control cidade" placeholder="Cidade" name="cidade">
									</div>

									<div class="form-group">
										<label for="estado">
											Estado
										</label>
										<input type="text" class="form-control estado" placeholder="Estado" name="estado">
									</div>

								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
								Fechar
							</button>
							<button type="button" class="btn btn-primary" onclick="cadastrarEndereco()">
								Cadastrar
							</button>
						</div>
					</div>
				</div>
			</div>

		</div>

		<script src="../../assets/js/perfil.js" charset="utf-8"></script>
		<script src="../../vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				$("#telefone_celular").mask("(99) 9 9999-9999");
				$("#telefone_residencial").mask("(99) 9999-9999");
				$("#cpf").mask("999.999.999-99");
				$("#cep").mask("99999-999");
				pegarEndereco();
			});
		</script>
	</body>
</html>
