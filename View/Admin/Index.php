<?php
	$database = new Database();
	$db = $database->getConnection();
	$produtos = new Produto($db);
	$categorias = new Categoria($db);
	$marcas = new Marca($db);	
	if($_POST)
	{
		if(isset($_POST["produto_id"]))
		{
			$produtos->produtoId = $_POST["produto_id"];
			$produtos->DesativarProduto();	
		}
		else if(isset($_POST["categoria_id"]))
		{
			$categorias->categoriaId = $_POST["categoria_id"];
			$categorias->DesativarCategoria();	
		}
		else if(isset($_POST["marca_id"]))
		{
			$marcas->marcaId = $_POST["marca_id"];
			$marcas->DesativarMarca();	
		}		
	}
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
				<div class="row">
					<div class="col-sm-12 col-md-offset-4 col-md-4">						
						<form method="post" action="./?pagina=Admin">
							<select class="form-control" name="limite">
								<option disabled selected>Mostrando</option>
								<option value="2">2</option>
								<option value="6">6</option>
								<option value="9">9</option>
								<option value="12">12</option>
							</select>
							<button id="mostrar-mais" class="btn btn-default">
								Alterar
							</button>						
					</div>
				</div>
				<?php
					$location = isset($_GET["location"]) ? $_GET["location"] : 0;
					$limite = isset($_POST["limite"]) ? $_POST["limite"] : 4;
					$produtos->ListarTudo($location, $limite);
				?>
				</form>
			</div>
			<hr/>
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-md-offset-1 col-md-5">
						<?php
							$categorias->ListarTodas();
						?>
					</div>
					<div  class="col-sm-10 col-md-5">
						<?php
							$marcas->ListarTodas();
						?>
					</div>
				</div>				
			</div>
