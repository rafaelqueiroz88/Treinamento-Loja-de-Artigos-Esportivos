

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
	}
?>

