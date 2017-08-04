<?php
	$database = new Database();
	$db = $database->getConnection();
	$produtos = new HomeModel($db);
	$produtos->ListarTudo();
?>