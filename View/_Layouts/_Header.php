<?php
	session_start();
	include_once './Cliente/Cliente.php';
	$cliente = new Cliente();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>
			<?php
				$cliente->ExibirTitulo();
			?>
		</title>
		<link rel="stylesheet" href="./Public/css/materialize.min.css">
		<link rel="stylesheet" href="./Public/css/estilo.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
		<nav>
			<div class="nav-wrapper black">
				<div class="container">
					<a href="./" class="brand-logo"><?php $cliente->ExibirLogotipo(); ?></a>
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="./?pagina=Cadastro"><i class="material-icons right">account_circle</i> Cadastro</a></li>
						<li><a href="./?pagina=Contato"><i class="material-icons right">phone</i> Contato</a></li>
						<li><a href="./?pagina=Sobre"><i class="material-icons right">tag_faces</i> Sobre Nós</a></li>
					</ul>
					<ul class="side-nav" id="mobile-demo">
						<li><a href="./?pagina=Cadastro"><i class="material-icons left">account_circle</i> Cadastro</a></li>
						<li><a href="./?pagina=Contato"><i class="material-icons left">phone</i> Contato</a></li>
						<li><a href="./?pagina=Sobre"><i class="material-icons left">tag_faces</i> Sobre Nós</a></li>
					</ul>
				</div>
			</div>				
		</nav>
		<main>
			<div class="rolar-topo">
				<a href="#" id="ir-topo"> <i class="material-icons">&#xE5D8;</i> </a>
			</div>
