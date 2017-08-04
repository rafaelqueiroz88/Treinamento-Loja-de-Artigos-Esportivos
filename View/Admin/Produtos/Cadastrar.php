<?php
	$database = new Database();
	$db = $database->getConnection();	
	$cadastro = new AdminModel($db);
	if($_POST)
	{
		$cadastro->nome = $_POST["nome"];
		$cadastro->categoria = $_POST["categoria"];
		$cadastro->marca = $_POST["marca"];
		$cadastro->valor = $_POST["valor"];
		$cadastro->foto = $_FILES["foto"]["name"];
		$cadastro->tmp_name = $_FILES["foto"]["tmp_name"];
		if($cadastro->CadastrarProduto())
		{
			$cadastro->AvisoSucessoCadastro();
		}
		else
		{
			$cadastro->AvisoErroCadastro();
		}
	}
?>
			
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-md-12">
						<h2 align="center">cadastro de produto</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-10 col-md-12">
						<hr/>
					</div>
				</div>
				<form class="form-horizontal" enctype="multipart/form-data" action="./?pagina=Admin&admin=Cadastrar-Produto" method="post">
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="nome" class="col-sm-2 col-md-2 control-label">Nome</label>
								<div class="col-sm-10 col-md-6">
									<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto" required/>
								</div>								
							</div>
						</div>
					</div>
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="nome" class="col-sm-2 col-md-2 control-label">Categoria</label>
								<div class="col-sm-10 col-md-6">
									<select class="form-control" name="categoria" required>
										<?php
											$cadastro->ListarCategoriasSelect();
										?>
									</select>
								</div>								
							</div>
						</div>
					</div>
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="nome" class="col-sm-2 col-md-2 control-label">Marca</label>
								<div class="col-sm-10 col-md-6">
									<select class="form-control" name="marca" required>
										<?php										
											$cadastro->ListarMarcasSelect();
										?>
									</select>
								</div>								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="valor" class="col-sm-2 col-md-2 control-label">Valor R$</label>
								<div class="col-sm-10 col-md-6">
									<div class="input-group">
										<div class="input-group-addon">R$</div>
										<input type="number" name="valor" class="form-control" id="valor" placeholder="50" required/>
										<div class="input-group-addon">,00</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="foto" class="col-sm-2 col-md-2 control-label">Foto</label>
								<div class="col-sm-10 col-md-6">
									<input type="file" class='btn btn-default' name="foto">
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-10 col-md-offset-3 col-md-6">
						<div class="right-button-margin">
							<button class="btn btn-primary pull-right">
								<span class="glyphicon glyphicon-ok"></span>
								Cadastrar
							</button>
						</div>
						<div class="left-button-margin">
							<button class="btn btn-warning pull-left" onclick="window.location='./?pagina=Admin&admin=Index'">
								<span class="glyphicon glyphicon-remove"></span>
								Cancelar
							</button>
						</div>
					</div>
				</form>
			</div>

