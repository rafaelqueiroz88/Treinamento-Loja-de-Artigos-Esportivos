<?php
	class Cliente
	{
		public $nome;
		public $titulo;
		public $logotipo;

		public function ExibirTitulo()
		{
			$this->titulo = "Loja";
			echo $this->titulo;
		}
	}