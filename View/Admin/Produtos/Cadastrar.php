<?php
	$database = new Database();
	$db = $database->getConnection();	
	$tenis = new Tenis($db);
	if($_POST)
	{
		$tenis->nome = $_POST["nome"];
		$tenis->categoria = $_POST["categoria"];
		$tenis->marca = $_POST["marca"];
		$tenis->preco = $_POST["preco"];
		$tenis->custo = $_POST["custo"];
		$tenis->estoque = $_POST["quantidade"];
		$tenis->foto = $_FILES["foto"]["name"];
		$tenis->tmp_name = $_FILES["foto"]["tmp_name"];
		if($tenis->CadastrarProduto())
		{
			$tenis->AvisoSucessoCadastro();
		}
		else
		{
			$tenis->AvisoErroCadastro();
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
											$tenis->ListarCategoriasSelect();
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
											$tenis->ListarMarcasSelect();
										?>
									</select>
								</div>								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="valor" class="col-sm-2 col-md-2 control-label">Preço</label>
								<div class="col-sm-10 col-md-6">
									<div class="input-group">
										<div class="input-group-addon">R$</div>
										<input type="number" name="preco" class="form-control" id="preco" placeholder="50" required/>
										<div class="input-group-addon">,00</div>
									</div>
									<small>O preço em que este produto será vendido</small>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="valor" class="col-sm-2 col-md-2 control-label">Custo</label>
								<div class="col-sm-10 col-md-6">
									<div class="input-group">
										<div class="input-group-addon">R$</div>
										<input type="number" name="custo" class="form-control" id="custo" placeholder="50" required/>
										<div class="input-group-addon">,00</div>
									</div>
									<small>O preço de custo deste produto<br/> Nota: Este campo precisa ser menor que o campo <strong>PREÇO</strong></small>
								</div>
							</div>
						</div>
					</div>
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="quantidade" class="col-sm-2 col-md-2 control-label">Quantidade</label>
								<div class="col-sm-10 col-md-6">
									<input type="number" class="form-control" id="quantidade" name="quantidade" value="1" placeholder="5" required/>
									<small>O estoque deste produto precisa ter no mínimo 1</small>
								</div>
							</div>
						</div>
					</div>
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="foto" class="col-sm-2 col-md-2 control-label">Foto</label>
								<div class="col-sm-10 col-md-6">
									<input type="file" class="btn btn-default caixa-imagem" name="foto" />
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
							<a class="btn btn-warning pull-left" href="./?pagina=Admin&admin=Index">
								<span class="glyphicon glyphicon-remove"></span>
								Cancelar
							</a>
						</div>
					</div>
				</form>
			</div>

