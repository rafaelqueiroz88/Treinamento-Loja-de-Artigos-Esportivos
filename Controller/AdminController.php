<?php	
	require './Model/AdminModel.php';
	class AdminController
	{
		public function Index()
		{
			include_once './View/Admin/Index.php';
		}
		public function CadastrarProduto()
		{
			include_once './View/Admin/Produtos/Cadastrar.php';
		}
		public function AtualizarProduto()
		{
			include_once './View/Admin/Produtos/Atualizar.php';
		}
		public function CadastrarCategoria()
		{
			include_once './View/Admin/Categorias/Cadastrar.php';
		}
		public function AtualizarCategoria()
		{
			include_once './View/Admin/Categorias/Atualizar.php';
		}
		public function CadastrarMarca()
		{
			include_once './View/Admin/Marcas/Cadastrar.php';
		}
		public function AtualizarMarca()
		{
			include_once './View/Admin/Marcas/Atualizar.php';
		}
		public function Header()
		{
			include_once './View/_Layouts/_Header_Admin.php';
		}
		public function Footer()
		{
			include_once './View/_Layouts/_Footer_Admin.php';
		}
	}