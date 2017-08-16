<?php
	$database = new Database();
	$db = $database->getConnection();
	$usuario = new Usuario($db);
	//Cadastro de usuários recebe um POSTBACK
	if($_POST)
	{
		$usuario->nome = $_POST["nome"];
		if($usuario->CadastrarUsuario())
		{
			$usuario->AvisoSucessoCadastro();
		}
		else
		{
			$usuario->AvisoErroCadastro();
		}
	}
?>

			<div class="container">
				<div class="row">
					<form class="col s12 m12">
						<div class="row">
							<div class="input-field col s6 col m6">
								<i class="material-icons prefix">account_circle</i>
								<input id="nome" type="text" name="nome" class="validate" />
								<label for="nome">Nome</label>
							</div>
							<div class="input-field col s6 col m6">
								<input id="sobrenome" type="text" name="sobrenome" class="validate" />
								<label for="nome">Sobrenome</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s2 col m2">
								<i class="material-icons prefix">phone</i>
								<input id="ddd" type="text" name="ddd" placeholder="11" class="validate" />
								<label for="ddd">ddd</label>
							</div>
							<div class="input-field col s2 col m10">
								<input id="telefone" type="text" name="telefone" class="validate" />
								<label for="telefone">Telefone</label>
							</div>
						</div>
					</form>
				</div>
			</div>
