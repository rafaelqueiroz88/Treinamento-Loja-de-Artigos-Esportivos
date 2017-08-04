<?php
	class AdminModel
	{
		private $conn;
		private $tbl_produtos = "trn_produtos";
		private $tbl_categorias = "trn_categorias";
		private $tbl_marcas = "trn_marcas";		

		public $nome;
		public $categoria;
		public $marca;
		public $valor;
		public $foto;
		public $tmp_name;

		//Método Construtor
        public function __construct($db)
        {
            $this->conn = $db;
        }
        public function CadastrarProduto()
        {
        	if ( isset( $_FILES['foto']['name'] ) && $_FILES['foto']['error'] == 0 ) 
            {
                $arquivo_tmp = $_FILES['foto']['tmp_name'];
                $pic = $_FILES['foto']['name'];
                $extensao = pathinfo ( $pic, PATHINFO_EXTENSION );
                $extensao = strtolower ( $extensao );
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao))
                {
                    $novoNome = uniqid ( time () ) .".".$extensao;
                    $destino = './Files/Catalogo_Produtos/'.$novoNome;
                    if (@move_uploaded_file ( $arquivo_tmp, $destino)) 
                    {
                        $query = "INSERT INTO ".$this->tbl_produtos." (prd_nome, prd_categoria, prd_marca, prd_valor, prd_foto, prd_data_entrada) VALUES (:nome, :categoria, :marca, :valor, :foto, now())";
                        $stmt = $this->conn->prepare($query);
                        $this->nome=htmlspecialchars(strip_tags($this->nome));
                        $this->categoria=htmlspecialchars(strip_tags($this->categoria));
                        $this->marca=htmlspecialchars(strip_tags($this->marca));
                        $this->valor=htmlspecialchars(strip_tags($this->valor));
                        //bind values
                        $stmt->bindParam(':nome', $this->nome);
                        $stmt->bindParam(':categoria', $this->categoria);
                        $stmt->bindParam(':marca', $this->marca);
                        $stmt->bindParam(':valor', $this->valor);
                        $stmt->bindParam(':foto', $novoNome);
                        if($stmt->execute())
                        {
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    }
                    else
                    {
                        echo " Erro detectado: ";
                    }
                }
            }
        }
        public function DesativarProduto()
        {

        }
        public function AtualizarProduto()
        {

        }
        public function AbrirProduto()
        {
        	
        }
		public function ListarTudo()
		{
			$query = "SELECT * FROM ".$this->tbl_produtos;
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			echo "<div class='row'>";
			echo "<div class='col-sm-10 col-md-offset-1 col-md-10'>";
			echo "<div class='table-responsive'>";
			echo "<table class='table table-condensed table-hover'>";
			if($num>0)
			{
				
				echo "<tr class=''>";
				echo "<th>Produto</th>";
				echo "<th>Marca</th>";
				echo "<th>Valor</th>";
				echo "<th>Ações</th>";
				echo "</tr>";
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					echo "<tr>";
					echo "<td>";
					echo $row["prd_nome"];
					echo "</td>";
					echo "<td>";
					echo $row["prd_marca"];
					echo "</td>";
					echo "<td>";
					echo "R$ ".$row["prd_valor"].",00";
					echo "</td>";
					echo "<td>";
					echo "<a href='#' class='btn btn-primary'>Atualizar</a> <a href='#' class='btn btn-danger'>Apagar</a>";
					echo "</td>";
				}
			}
			echo "</table>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
		public function ListarMarcasSelect()
		{
			$query = "SELECT * FROM ".$this->tbl_marcas;
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			if($num>0)
			{
				echo "<option selected disabled>Escolha uma Marca</option>";
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					echo "<option value='".$row["mar_id"]."'>".$row["mar_nome"]."</option>";
				}
			}
		}
		public function ListarCategoriasSelect()
		{
			$query = "SELECT * FROM ".$this->tbl_categorias;
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			if($num>0)
			{
				echo "<option selected disabled>Escolha uma Categoria</option>";
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					echo "<option value='".$row["cat_id"]."'>".$row["cat_nome"]."</option>";
				}
			}
		}
		public function AvisoSucessoCadastro()
		{
			echo "<div class='alert alert-success' role='alert'><center>Produto Cadastrado com Sucesso!</center></div>";
		}
		public function VerData()
		{
			echo date('Y');
		}
	}