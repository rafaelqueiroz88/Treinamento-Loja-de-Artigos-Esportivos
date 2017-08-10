<?php
	$database = new Database();
	$db = $database->getConnection();	
	$tenis = new Tenis($db);
	$id = isset($_GET["produto"]) ? $_GET["produto"] : die ("Objeto não especificado");
	$tenis->produtoId = $id;
	$tenis->AbrirProduto();
	if($_POST)
	{
		$tenis->nome = $_POST["nome"];
		$tenis->categoria = $_POST["categoria"];
		$tenis->marca = $_POST["marca"];
		$tenis->preco = $_POST["preco"];
		$tenis->custo = $_POST["custo"];
		$tenis->estoque = $_POST["quantidade"];
		$tenis->produtoId = $_POST["id"];
		if($tenis->AtualizarProduto())
		{
			$tenis->AvisoSucessoAtualizacao();
		}
		else
		{
			$tenis->AvisoErroAtualizacao();
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
				<form class="form-horizontal" action="./?pagina=Admin&admin=Atualizar-Produto&produto=<?php echo $id;?>" method="post">
					<input type="hidden" class="form-control" id="nome" name="id" placeholder="Nome do Produto" value="<?php echo $tenis->produtoId; ?>" required/>
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="nome" class="col-sm-2 col-md-2 control-label">Nome</label>
								<div class="col-sm-10 col-md-6">
									<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto" value="<?php echo $tenis->nome; ?>" required/>
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
											if(isset($_GET["produto"]))
											{
												$tenis->ListarCategoriasSelected();
											}
											else
											{
												$tenis->ListarCategoriasSelect();
											}
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
											if(isset($_GET["produto"]))
											{
												$tenis->ListarMarcasSelected();
											}
											else
											{
												$tenis->ListarMarcasSelect();
											}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="valor" class="col-sm-2 col-md-2 control-label">Preço R$</label>
								<div class="col-sm-10 col-md-6">
									<div class="input-group">
										<div class="input-group-addon">R$</div>
										<input type="number" name="preco" class="form-control" id="preco" value="<?php echo $tenis->preco; ?>" placeholder="50" required/>
										<div class="input-group-addon">,00</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="valor" class="col-sm-2 col-md-2 control-label">Custo R$</label>
								<div class="col-sm-10 col-md-6">
									<div class="input-group">
										<div class="input-group-addon">R$</div>
										<input type="number" name="custo" class="form-control" id="custo" value="<?php echo $tenis->custo; ?>" placeholder="50" required/>
										<div class="input-group-addon">,00</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="quantidade" class="col-sm-2 col-md-2 control-label">Quantidade</label>
								<div class="col-sm-10 col-md-6">
									<input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo $tenis->estoque; ?>" placeholder="5" required/>
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

