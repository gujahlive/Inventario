<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->

<html lang="en">

	<body>
		<div id="app">
			<?php
					require_once "../utils/header.php";
					require_once "../../classes/Utensilio.class.php";

					$Utensilio = Utensilio::getInstance(Conexao::getInstance());
					$equipamento = [];
					if(isset($_GET["update"])){
							$equipamento = $Utensilio->pegarDados($_GET["update"]);
					} else {
						$equipamento = (object) [
							'id_utensilio' => '',
							'nome' => '',
							'marca' => '',
							'preco' => '',
							'descricao' => ''
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
									<h5 class="panel-title">Formulário de equipamentos</h5>
								</div>
								<div class="panel-body">
									<form role="form" action="../../php/equipamento/cadastro.php" method="POST">
										<input type="hidden" class="form-control" name="id_equipamento" value="<?php echo $equipamento->id_utensilio ?>">

										<div class="row">
                      <div class="col-sm-6">
  											<div class="form-group">
  	                      <label for="nome">
  	                        Nome
  	                      </label>
  	                      <input type="text" required class="form-control" name="nome" value="<?php echo $equipamento->nome ?>">
  	                    </div>
  										</div>
  										<div class="col-sm-6">
  											<div class="form-group">
  	                      <label for="marca">
  	                        Marca
  	                      </label>
  	                      <input type="text" required class="form-control" name="marca" value="<?php echo $equipamento->marca ?>">
  	                    </div>
  										</div>
										</div>

										<div class="form-group">
											<label for="preco">Preco</label>
											<input type="text" name="preco" class="form-control" value="<?php echo $equipamento->preco ?>">
										</div>

										<div class="form-group">
                      <label for="descricao">
                        Descrição
                      </label>
                      <textarea name="descricao" rows="8" class="form-control" cols="80" ><?php echo $equipamento->descricao ?></textarea>
                    </div>
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

	</body>
</html>
