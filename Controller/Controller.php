<?php
	require './Model/HomeModel.php';
	class Controller
	{
		public function Index()
		{
			include_once './View/Home.php';
		}
		public function Header()
		{
			include_once './View/_Layouts/_Header.php';
		}
		public function Footer()
		{
			include_once './View/_Layouts/_Footer.php';
		}
		public function Login()
		{
			include_once './View/Login.php';
		}
		public function Admin($admin)
		{
			include_once './View/Admin.php';			
		}
		public function Cadastrar()
		{
			include_once './View/Home/Usuario/Cadastrar.php';
		}
	}