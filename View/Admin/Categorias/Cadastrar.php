<?php
	$database = new Database();
	$db = $database->getConnection();	
	$categoria = new Categoria($db);
	if($_POST)
	{
		$categoria->categoria = $_POST["nome"];
		if($categoria->CadastrarCategoria())
		{
			$categoria->AvisoSucessoCadastro();
		}
		else
		{
			$categoria->AvisoErroCadastro();
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
				<form class="form-horizontal" action="./?pagina=Admin&admin=Cadastrar-Categoria" method="post">
					<div class="row">					
						<div class="col-sm-10 col-md-offset-3 col-md-8">
							<div class="form-group">
								<label for="nome" class="col-sm-2 col-md-2 control-label">Categoria</label>
								<div class="col-sm-10 col-md-6">
									<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Categoria" required/>
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

