<?php
	$database = new Database();
	$db = $database->getConnection();	
	$marca = new Marca($db);
	if($_POST)
	{
		$marca->nome = $_POST["nome"];
		$marca->marcaId = $_POST["id"];
		if($marca->AtualizarMarca())
		{
			$marca->AvisoSucessoAtualizar();
		}
		else
		{
			$marca->AvisoErroAtualizar();
		}
	}
	$id = isset($_GET["marca"]) ? $_GET["marca"] : 0;
	$marca->marcaId = $id;
	$marca->AbrirMarca($db);
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
				<form class="form-horizontal" enctype="multipart/form-data" action="./?pagina=Admin&admin=Atualizar-Marca" method="post">
					<input type="hidden" name="id" value="<?php echo $marca->marcaId; ?>"/>
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="nome" class="col-sm-2 col-md-2 control-label">Marca</label>
								<div class="col-sm-10 col-md-6">
									<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $marca->nome ?>" placeholder="Nome da Marca" required/>
								</div>								
							</div>
						</div>
					</div>
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="nome" class="col-sm-2 col-md-2 control-label">Status</label>
								<div class="col-sm-10 col-md-6">
									<input type="text" class="form-control" value="<?php echo $marca->status ?>" placeholder="Status da Marca" disabled/>
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
