<?php
	$database = new Database();
	$db = $database->getConnection();
	$admin = new AdminModel($db);
?>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="jumbotron">
							<h2 align="center">painel administrativo</h2>
						</div>
					</div>
					<div class="col-sm-12 col-md-12">
						<h3 align="center">lista produtos</h3>
					</div>
					<div class="col-sm-12 col-md-12">
						<div class="left-button-margin">
							<a href="./?pagina=Admin&admin=Cadastrar-Produto" class="btn btn-default pull-left">
								<span class="glyphicon glyphicon-plus"></span>
								Produtos
							</a>
						</div>
						<div class="right-button-margin">
							<a href="./?pagina=Admin&admin=Listar" class="btn btn-default pull-right">
								<span class="glyphicon glyphicon-th-list"></span>
								Ver Produtos
							</a>
						</div>
					</div>
				</div>
			</div>
			<hr/>
			<div class="container">
				<?php
					$admin->ListarTudo();
				?>
			</div>
			