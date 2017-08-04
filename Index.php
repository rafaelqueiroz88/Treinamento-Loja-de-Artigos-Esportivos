<?php
	$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : "Index";
	$admin = isset($_GET["admin"]) ? $_GET["admin"] : "Index";
	include_once 'Controller/Controller.php'; 
	$controller = new Controller();
	include_once './Config/Database.php';
	switch($pagina)
	{
		case 'Index' :
			$controller->Header();
			$controller->Index();
			$controller->Footer();
			break;
		case 'Login' :
			$controller->Header();
			$controller->Login();
			$controller->Footer();
			break;
		case 'Admin' :
			$controller->Admin($admin);
			break;
	}