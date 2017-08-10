<?php
	class Produto
	{
		protected $conn;
		protected $tbl_produtos = "trn_produtos";

		public $produtoId;
		public $nome;
		public $preco;
		public $custo;
		public $foto;
		public $tmp_name;
	}