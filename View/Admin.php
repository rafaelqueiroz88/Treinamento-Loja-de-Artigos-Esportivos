

<?php
	$admin = isset($_GET["admin"]) ? $_GET["admin"] : "Index";
	include_once './Controller/AdminController.php';
	$adminController = new AdminController();
	include_once './Config/Database.php';
	switch($admin)
	{
		case "Index" :
			$adminController->Header();
			$adminController->Index();
			$adminController->Footer();
			break;
		case "Cadastrar-Produto" :
			$adminController->Header();
			$adminController->CadastrarProduto();
			$adminController->Footer();
			break;
		case "Atualizar-Produto" :
			$adminController->Header();
			$adminController->AtualizarProduto();
			$adminController->Footer();
			break;
		case "Cadastrar-Categoria" :
			$adminController->Header();
			$adminController->CadastrarCategoria();
			$adminController->Footer();
			break;
		case "Atualizar-Categoria" :
			$adminController->Header();
			$adminController->AtualizarCategoria();
			$adminController->Footer();
			break;
		case "Cadastrar-Marca" :
			$adminController->Header();
			$adminController->CadastrarMarca();
			$adminController->Footer();
			break;
		case "Atualizar-Marca" :
			$adminController->Header();
			$adminController->AtualizarMarca();
			$adminController->Footer();
			break;
	}
?>

