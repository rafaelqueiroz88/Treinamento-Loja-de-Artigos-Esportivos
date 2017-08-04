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
		public function Header()
		{
			include_once './View/_Layouts/_Header_Admin.php';
		}
		public function Footer()
		{
			include_once './View/_Layouts/_Footer_Admin.php';
		}
	}