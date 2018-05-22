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
					$equipamentos = $Utensilio->listarEquipamentos();
			?>

			<div class="app-content">
				<!-- start: TOP NAVBAR -->

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12 space20">
									<a href="./form.php" class="btn btn-green">
										Novo Equipamento <i class="fa fa-plus"></i>
									</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15"><span class="text-bold">Equipamentos</span></h5>
									<table class="table table-striped table-bordered table-hover table-full-width" id="TableData">
										<thead>
											<tr>
												<th>#</th>
												<th>Nome</th>
												<th>Marca</th>
                        <th class="hidden-xs">Preço</th>
												<th>Ações</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($equipamentos as $key => $equipamento ){?>
												<tr>
													<td><?php echo $key + 1; ?></td>
													<td><?php echo $equipamento->nome; ?></td>
													<td><?php echo $equipamento->marca; ?></td>
													<td><?php echo $equipamento->preco; ?></td>
													<td>
														<a href="./form.php?update=<?php echo $equipamento->id_utensilio ?>" class="btn btn-primary">Editar</a>
														<a href="../../php/equipamento/deletar.php?deletar=<?php echo $equipamento->id_utensilio ?>" class="btn btn-danger">Deletar</a>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
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
			TableData.init();
			$('#TableData').DataTable( {
				"language": {
					"sEmptyTable": "Nenhum registro encontrado",
					"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
					"sInfoFiltered": "(Filtrados de _MAX_ registros)",
					"sInfoPostFix": "",
					"sInfoThousands": ".",
					"sLengthMenu": "_MENU_ resultados por página",
					"sLoadingRecords": "Carregando...",
					"sProcessing": "Processando...",
					"sZeroRecords": "Nenhum registro encontrado",
					"sSearch": "Pesquisar",
					"oPaginate": {
							"sNext": "Próximo",
							"sPrevious": "Anterior",
							"sFirst": "Primeiro",
							"sLast": "Último"
					},
					"oAria": {
							"sSortAscending": ": Ordenar colunas de forma ascendente",
							"sSortDescending": ": Ordenar colunas de forma descendente"
					}
				}
			});

			</script>
	</body>
</html>
