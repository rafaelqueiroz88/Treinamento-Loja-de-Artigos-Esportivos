<?php
	$database = new Database();
	$db = $database->getConnection();	
	$categorias = new Categoria($db);
	if($_POST)
	{
		$categorias->nome = $_POST["nome"];
		$categorias->categoriaId = $_POST["id"];
		if($categorias->AtualizarCategoria())
		{
			$categorias->AvisoSucessoAtualizar();
		}
		else
		{
			$categorias->AvisoErroAtualizar();
		}
	}
	$id = isset($_GET["categoria"]) ? $_GET["categoria"] : 0;
	$categorias->categoriaId = $id;
	$categorias->AbrirCategoria($db);
?>
			
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-md-12">
						<h2 align="center">atualização de marca</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-10 col-md-12">
						<hr/>
					</div>
				</div>
				<form class="form-horizontal" enctype="multipart/form-data" action="./?pagina=Admin&admin=Atualizar-Categoria" method="post">
					<input type="hidden" name="id" value="<?php echo $categorias->categoriaId; ?>"/>
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="nome" class="col-sm-2 col-md-2 control-label">Categoria</label>
								<div class="col-sm-10 col-md-6">
									<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $categorias->nome ?>" placeholder="Nome da Categoria" required/>
								</div>								
							</div>
						</div>
					</div>
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="nome" class="col-sm-2 col-md-2 control-label">Status</label>
								<div class="col-sm-10 col-md-6">
									<input type="text" class="form-control" value="<?php echo $categorias->status ?>" placeholder="Status da Categoria" disabled/>
									<small>Atenção: Ao clicar em <strong><span class="glyphicon glyphicon-ok"></span> ATUALIZAR</strong> a marca em questão será reativada</small>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-10 col-md-offset-3 col-md-6">
						<div class="right-button-margin">
							<button class="btn btn-primary pull-right">
								<span class="glyphicon glyphicon-ok"></span>
								Atualizar
							</button>
						</div>
						<div class="left-button-margin">
							<a class="btn btn-warning pull-left" href="./?pagina=Admin&admin=Index">
								<span class="glyphicon glyphicon-remove"></span>
								Cancelar
							</a>
						</div>
					</div>
				</form>
			</div>
