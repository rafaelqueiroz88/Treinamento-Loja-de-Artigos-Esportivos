<?php
	$database = new Database();
	$db = $database->getConnection();
	$usuario = new Usuario($db);
	//Cadastro de usuários recebe um POSTBACK
	if($_POST)
	{
		$tenis->nome = $_POST["nome"];
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
