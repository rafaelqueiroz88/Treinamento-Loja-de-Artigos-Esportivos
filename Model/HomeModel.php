<?php
	include_once "Produtos.php";
	class Calcados extends Produto
	{
		private $tbl_categorias = "trn_categorias";
		private $tbl_marcas = "trn_marcas";
		private $tbl_estoque = "trn_estoque";

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
			$query = "SELECT * FROM ".$this->tbl_produtos." INNER JOIN ".$this->tbl_marcas." WHERE ".$this->tbl_produtos.".prd_marca = ".$this->tbl_marcas.".mar_id";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			$total = $num;
			$query = "SELECT * FROM ".$this->tbl_produtos." INNER JOIN ".$this->tbl_marcas.", ".$this->tbl_estoque." WHERE ".$this->tbl_produtos.".prd_marca = ".$this->tbl_marcas.".mar_id AND ".$this->tbl_produtos.".prd_id = ".$this->tbl_estoque.".est_prd_id AND ".$this->tbl_produtos.".prd_status = 0";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			echo "<div class='row'>";			
			if($num>0)
			{
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					echo "<div class='col s12 m3'>";
					echo "<div class='card'>";
					echo "<div class='card-image waves-effect waves-block waves-light'>";
					echo "<img class='activator mostruario-principal' src='./Files/Catalogo_Produtos/".$row["prd_foto"]."'>";
					echo "</div>";
					echo "<div class='card-content'>";
					echo "<span class='card-title activator grey-text text-darken-4'> R$ ".$row["prd_preco"].",00 <i class='material-icons right'>more_vert</i></span>";
					//echo "<p><a href='./?pagina=Comprar&produto=".$row["prd_id"]."'>Comprar</a></p>";
					echo "<p><a href='./Pagseguro.php'>Comprar</a></p>";
					//echo "<p><a href='./?pagina=Comprar&produto=".$row["prd_id"]."'>Comprar</a></p>";
					echo "</div>";
					echo "<div class='card-reveal'>";
					echo "<span class='card-title grey-text text-darken-4'> ".$row["prd_nome"]." <i class='material-icons right'>close</i></span>";
					echo "<p>Este é um produto ".$row["mar_nome"]." de alta qualidade. Produto pronta entrega</p>";
					echo "</div>";
					echo "</div>";
					echo "</div>";
				}
			}
			echo "</div>";
		}
	}
	class Usuario
	{
		public function __construct($db)
        {
            $this->conn = $db;
        }
		public function Login()
		{

		}
		public function NovoUsuario()
		{
			
		}
	}
	class Home
	{
		public function VerData()
		{
			echo date('Y');
		}
	}