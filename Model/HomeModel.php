<?php
	class HomeModel
	{
		private $conn;
		private $tbl_produtos = "trn_produtos";
		private $tbl_categorias = "trn_categorias";
		private $tbl_marcas = "trn_marcas";		

		public $nome;
		public $categoria;
		public $valor;
		public $foto;

		//Objetos temporários de imagem aqui

		//Método Construtor
        public function __construct($db)
        {
            $this->conn = $db;
        }
		public function ListarTudo()
		{
			
		}
		public function Login()
		{

		}
		public function NovoUsuario()
		{
			
		}
		public function VerData()
		{
			echo date('Y');
		}
	}