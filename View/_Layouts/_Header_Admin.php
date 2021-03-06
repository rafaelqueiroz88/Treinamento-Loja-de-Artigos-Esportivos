<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Administração</title>
		<link rel="stylesheet" href="./Public/css/bootstrap.min.css">
		<link rel="stylesheet" href="./Public/css/estilo.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
		<main class="adm">
			<nav class="navbar navbar-fixed-top navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Loja</a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active"><a href="./?pagina=Admin&admin=Index">Home<span class="sr-only">(current)</span></a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastrar <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="./?pagina=Admin&admin=Cadastrar-Produto">Produto</a></li>
									<li><a href="./?pagina=Admin&admin=Cadastrar-Categoria">Categoria</a></li>
									<li><a href="./?pagina=Admin&admin=Cadastrar-Marca">Marca</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="#">Fornecedor</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="#">One more separated link</a></li>
								</ul>
							</li>							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Listar <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="./?pagina=Admin&admin=Index">Produto</a></li>
									<li><a href="./?pagina=Admin&admin=Listar-Categoria">Categoria</a></li>
									<li><a href="./?pagina=Admin&admin=Listar-Marca">Marca</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="#">Fornecedor</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="#">One more separated link</a></li>
								</ul>
							</li>
						</ul>
						<form class="navbar-form navbar-left" action="./?pagina=Admin&admin=Index" method="post">
							<div class="form-group">								
								<input type="text" id="busca" name="busca" class="form-control" placeholder="Procurar Produto">
							</div>
							<button type="submit" class="btn btn-default">Procurar</button>
						</form>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#">Link</a></li>
							<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="rolar-topo">
				<a href="#" id="ir-topo"> <i class="material-icons">&#xE5D8;</i> </a>
			</div>
