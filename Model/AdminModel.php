<?php
	class Produto
	{
		private $conn;
		private $tbl_produtos = "trn_produtos";
		private $tbl_categorias = "trn_categorias";
		private $tbl_marcas = "trn_marcas";		

		public $produtoId;
		public $nome;
		public $categoria;
		public $marca;
		public $preco;
		public $custo;
		public $foto;
		public $tmp_name;

		//Método Construtor
        public function __construct($db)
        {
            $this->conn = $db;
        }
        public function CadastrarMarca()
        {
        	$query = "INSERT INTO ".$this->tbl_marcas." (mar_nome, mar_data_entrada) VALUES (?, now())";
            $stmt = $this->conn->prepare($query);
            $this->marca=htmlspecialchars(strip_tags($this->marca));
            //bind values
            $stmt->bindParam(1, $this->marca);
            if($stmt->execute())
            {
            	return true;
            }
            else
            {
            	return false;
            }
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
                        $query = "INSERT INTO ".$this->tbl_produtos." (prd_nome, prd_categoria, prd_marca, prd_preco, prd_custo, prd_foto, prd_data_entrada, prd_status) VALUES (:nome, :categoria, :marca, :preco, :custo, :foto, now(), 0)";
                        $stmt = $this->conn->prepare($query);
                        $this->nome=htmlspecialchars(strip_tags($this->nome));
                        $this->categoria=htmlspecialchars(strip_tags($this->categoria));
                        $this->marca=htmlspecialchars(strip_tags($this->marca));
                        $this->preco=htmlspecialchars(strip_tags($this->preco));
                        $this->custo=htmlspecialchars(strip_tags($this->custo));
                        //bind values
                        $stmt->bindParam(':nome', $this->nome);
                        $stmt->bindParam(':categoria', $this->categoria);
                        $stmt->bindParam(':marca', $this->marca);
                        $stmt->bindParam(':preco', $this->preco);
                        $stmt->bindParam(':custo', $this->custo);
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
        	$query = "UPDATE ".$this->tbl_produtos." SET prd_status = 1 WHERE prd_id = ?";
        	$stmt = $this->conn->prepare($query);
        	$this->produtoId=htmlspecialchars(strip_tags($this->produtoId));
        	$stmt->bindParam(1, $this->produtoId);
            if($stmt->execute())
            {
            	return true;
            }
            else
            {
            	return false;
            }
        }
        public function AtualizarProduto()
        {
        	$query = "UPDATE ".$this->tbl_produtos." SET prd_nome = :nome,  prd_categoria = :categoria, prd_marca = :marca, prd_preco = :preco, prd_custo = :custo WHERE prd_id = :id";
            $stmt = $this->conn->prepare($query);
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->categoria=htmlspecialchars(strip_tags($this->categoria));
            $this->marca=htmlspecialchars(strip_tags($this->marca));
            $this->preco=htmlspecialchars(strip_tags($this->preco));
            $this->custo=htmlspecialchars(strip_tags($this->custo));
            $this->produtoId=htmlspecialchars(strip_tags($this->produtoId));
            //bind values
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':categoria', $this->categoria);
            $stmt->bindParam(':marca', $this->marca);
            $stmt->bindParam(':preco', $this->preco);
            $stmt->bindParam(':custo', $this->custo);
            $stmt->bindParam(':id', $this->produtoId);
            if($stmt->execute())
            {
            	return true;
            }
            else
            {
            	return false;
            }
        }
        public function AbrirProduto()
        {
        	$query = "SELECT * FROM ".$this->tbl_produtos." WHERE prd_id = ?";
        	$stmt = $this->conn->prepare($query);
        	$this->produtoId=htmlspecialchars(strip_tags($this->produtoId));
            $stmt->bindParam(1, $this->produtoId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->produtoId = $row["prd_id"];
            $this->nome = $row["prd_nome"];
            $this->categoria = $row["prd_categoria"];
            $this->marca = $row["prd_marca"];
            $this->preco = $row["prd_preco"];
            $this->custo = $row["prd_custo"];
            $this->foto = $row["prd_foto"];
        }
		public function ListarTudo($from, $limite)
		{
			$query = "SELECT * FROM ".$this->tbl_produtos." INNER JOIN ".$this->tbl_marcas." WHERE ".$this->tbl_produtos.".prd_marca = ".$this->tbl_marcas.".mar_id";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			$total = $num;
			$query = "SELECT * FROM ".$this->tbl_produtos." INNER JOIN ".$this->tbl_marcas." WHERE ".$this->tbl_produtos.".prd_marca = ".$this->tbl_marcas.".mar_id LIMIT $from, $limite";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			echo "<div class='row'>";
			echo "<div class='col-sm-10 col-md-offset-1 col-md-10'>";
			echo "<div class='table-responsive'>";
			echo "<table class='table table-condensed table-hover'>";
			if($num>0)
			{
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Produto</th>";
				echo "<th>Marca</th>";
				echo "<th>Status</th>";
				echo "<th>Custo</th>";
				echo "<th>Preço</th>";
				echo "<th>Ações</th>";
				echo "</tr>";
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					echo "<tr>";
					echo "<td style='vertical-align: middle;'>";
					echo $row["prd_id"];
					echo "</td>";
					echo "<td style='vertical-align: middle;'>";
					echo $row["prd_nome"];
					echo "</td>";
					echo "<td style='vertical-align: middle;'>";
					echo $row["mar_nome"];
					echo "</td>";
					echo "<td style='vertical-align: middle;'>";
						if($row["prd_status"]==0){
							echo "Produto Ativado";
						}
						else
						{
							echo "Produto Desativado";
						}
					echo "</td>";
					echo "<td style='vertical-align: middle;'>";
					echo "R$ ".$row["prd_custo"].",00";
					echo "</td>";
					echo "<td style='vertical-align: middle;'>";
					echo "R$ ".$row["prd_preco"].",00";
					echo "</td>";
					echo "<td>";
					echo "<a href='./?pagina=Admin&admin=Atualizar-Produto&produto=".$row["prd_id"]."' class='btn btn-primary'> <span class='glyphicon glyphicon-pencil'></span> Atualizar</a> ";
					//echo "<a href='#' class='btn btn-info'> <span class='glyphicon glyphicon-eye-open'></span> Abrir </a> ";
					echo "<a href='#' id='funcao' data-name='".$row["prd_nome"]."' action='apagar-produto' delete-id='".$row["prd_id"]."' class='btn btn-danger' > <span class='glyphicon glyphicon-trash'></span> Apagar</a>";
					echo "</td>";
				}
			}
			echo "</table>";
			echo "</div>";
			echo "</div>";
			echo "<div class='row'>";
			echo "<div class='col-sm-10 col-md-offset-1 col-md-10'>";
			echo "<center>";
			echo "<nav aria-label='Page navigation'>";
			echo "<ul class='pagination'>";
			/*
			echo "<li>";
			echo "<a href='?pagina=Admin&from=0' aria-label='Previous'>";
			echo "<span aria-hidden='true'>&laquo;</span>";
			echo "</a>";
			echo "</li>";
			*/
			$limitar = ceil($total/$limite);
			

			if(!isset($_GET["from"]) || $_GET["from"] == 0 || $_GET["from"] == 1)
			{

				
				//O seguinte código consegue fazer paginação e anular o link ativo, porém só funciona quando o $from é igual a 0
				//encontrar uma lógica que funcione para o caso do $from estar em outra casa
				for($i = 1; $i <= $limitar; $i++)
				{
					$j = ($i * $limite) - $limite;
					echo "<li><a href='?pagina=Admin&from=$j'>$i</a></li>";
					/*
					if($i == 1)
					{
						echo "<li><a href='#' disabled>$i</a></li>";
					}
					else
					{
						$j = ($i * $limite) - $limite;
						echo "<li><a href='?pagina=Admin&from=$j'>$i</a></li>";
					}
					*/
				}
			}
			else
			{
				for($i = 1; $i <= $limitar; $i++)
				{
					$j = ($i * $limite - $limite);
					echo "<li><a href='?pagina=Admin&from=$j'>$i</a></li>";
				}
			}
			
			

			/*echo "<li>";
			echo "<a href='#'' aria-label='Next'>";
			echo "<span aria-hidden='true'>&raquo;</span>";
			echo "</a>";
			echo "</li>";*/
			echo "</ul>";
			echo "</nav>";
			echo "</center>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
		public function ListarMarcasSelect()
		{
			$query = "SELECT * FROM ".$this->tbl_marcas." WHERE mar_status = 0";
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
		public function ListarMarcasSelected()
		{
			$query = "SELECT * FROM ".$this->tbl_produtos." INNER JOIN ".$this->tbl_marcas." WHERE ".$this->tbl_produtos.".prd_marca = ".$this->tbl_marcas.".mar_id AND prd_id = ?";
			$stmt = $this->conn->prepare($query);
    		$this->produtoId=htmlspecialchars(strip_tags($this->produtoId));
        	$stmt->bindParam(1, $this->produtoId);
        	$stmt->execute();
        	$row = $stmt->fetch(PDO::FETCH_ASSOC);
        	echo "<option selected value='".$row["mar_id"]."'>".$row["mar_nome"]." (Selecionado) </option>";
        	$query = "SELECT * FROM ".$this->tbl_marcas." WHERE mar_status = 0";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			if($num>0)
			{
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					echo "<option value='".$row["mar_id"]."'>".$row["mar_nome"]."</option>";
				}
			}
		}
		public function ListarCategoriasSelect()
		{
			$query = "SELECT * FROM ".$this->tbl_categorias." WHERE cat_status = 0";
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
		public function ListarCategoriasSelected()
		{
			$query = "SELECT * FROM ".$this->tbl_produtos." INNER JOIN ".$this->tbl_categorias." WHERE ".$this->tbl_produtos.".prd_categoria = ".$this->tbl_categorias.".cat_id AND prd_id = ?";
			$stmt = $this->conn->prepare($query);
    		$this->produtoId=htmlspecialchars(strip_tags($this->produtoId));
        	$stmt->bindParam(1, $this->produtoId);
        	$stmt->execute();
        	$row = $stmt->fetch(PDO::FETCH_ASSOC);
        	echo "<option selected value='".$row["cat_id"]."'>".$row["cat_nome"]." (Selecionado) </option>";
        	$query = "SELECT * FROM ".$this->tbl_categorias." WHERE cat_status = 0";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			if($num>0)
			{
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					echo "<option value='".$row["cat_id"]."'>".$row["cat_nome"]."</option>";
				}
			}
		}
		/* Funções de aviso */
		public function AvisoSucessoCadastro()
		{
			echo "<div class='alert alert-success' role='alert'><center>Produto Cadastrado com Sucesso! <br/> <strong><a href='./?pagina=Admin&admin=Index'>Retornar a página principal </a></strong></center></div>";
		}
		public function AvisoSucessoAtualizacao()
		{
			echo "<div class='alert alert-success' role='alert'><center>Produto Cadastrado com Sucesso! <br/> <strong><a href='./?pagina=Admin&admin=Index'>Retornar a página principal </a></strong></center></div>";
		}
		public function AvisoErroAtualizacao()
		{
			echo "<div class='alert alert-danger' role='alert'><center>Falha ao atualizar o produto desejado! <br/> <strong><a href='./?pagina=Admin&admin=Index'>Retornar a página principal </a></strong></center></div>";
		}
		public function VerData()
		{
			echo date('Y');
		}
	}

	class Categoria
	{
		private $conn;
		private $tbl_produtos = "trn_produtos";
		private $tbl_categorias = "trn_categorias";

		public $produtoId;
		public $categoriaId;
		public $nome;
		public $categoria;
		public $marca;
		public $preco;
		public $custo;
		public $foto;
		public $tmp_name;

		//Método Construtor
        public function __construct($db)
        {
            $this->conn = $db;
        }
        public function CadastrarCategoria()
        {
        	$query = "INSERT INTO ".$this->tbl_categorias." (cat_nome) VALUES (?)";
            $stmt = $this->conn->prepare($query);
            $this->categoria=htmlspecialchars(strip_tags($this->categoria));
            //bind values
            $stmt->bindParam(1, $this->categoria);
            if($stmt->execute())
            {
            	return true;
            }
            else
            {
            	return false;
            }
        }
        public function ListarTodas()
		{
			$query = "SELECT * FROM ".$this->tbl_categorias." ORDER BY cat_status ASC";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			echo "<div class='table-responsive'>";
			echo "<table class='table table-condensed table-hover'>";
			if($num>0)
			{
				
				echo "<tr>";
				echo "<th>Categoria</th>";
				echo "<th>Status</th>";
				echo "<th>Ações</th>";
				echo "</tr>";
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					echo "<tr>";
					echo "<td style='vertical-align: middle;'>";
					echo $row["cat_nome"];
					echo "</td>";
					echo "<td style='vertical-align: middle;'>";
					if($row["cat_status"]==0)
					{
						echo "Categoria Ativada";
					}
					else
					{
						echo "Categoria Desativada";
					}
					echo "</td>";
					echo "<td>";
					echo "<a href='#' class='btn btn-primary' id='funcao' action='atualizar-categoria'> <span class='glyphicon glyphicon-pencil'></span> Atualizar</a> ";
					echo "<a href='#' id='funcao' action='apagar-categoria' data-name='".$row["cat_nome"]."' delete-id='".$row["cat_id"]."' class='btn btn-danger' > <span class='glyphicon glyphicon-trash'></span> Apagar</a>";
					echo "</td>";
				}
			}
			echo "</table>";
			echo "</div>";
		}
		public function DesativarCategoria()
        {
        	$query = "UPDATE ".$this->tbl_categorias." SET cat_status = 1 WHERE cat_id = ?";
        	$stmt = $this->conn->prepare($query);
        	$this->categoriaId=htmlspecialchars(strip_tags($this->categoriaId));
        	$stmt->bindParam(1, $this->categoriaId);
            if($stmt->execute())
            {
            	return true;
            }
            else
            {
            	return false;
            }
        }
		public function AvisoSucessoCadastro()
		{
			echo "<div class='alert alert-success' role='alert'><center>Categoria Cadastrada com Sucesso! <br/> <strong><a href='./?pagina=Admin&admin=Index'>Retornar a página principal </a></strong></center></div>";
		}
		public function AvisoErroCadastro()
		{
			echo "<div class='alert alert-danger' role='alert'><center>Falha ao cadastrar a categoria desejada! <br/> <strong><a href='./?pagina=Admin&admin=Index'>Retornar a página principal </a></strong></center></div>";
		}
	}

	class Marca
	{
		private $conn;
		private $tbl_produtos = "trn_produtos";
		private $tbl_marcas = "trn_marcas";		

		public $produtoId;
		public $marcaId;
		public $nome;
		public $categoria;
		public $marca;
		public $preco;
		public $custo;
		public $status;
		public $foto;
		public $tmp_name;

		//Método Construtor
        public function __construct($db)
        {
            $this->conn = $db;
        }
        public function CadastrarMarca()
        {
        	$query = "INSERT INTO ".$this->tbl_marcas." (mar_nome, mar_data_entrada) VALUES (?, now())";
            $stmt = $this->conn->prepare($query);
            $this->marca=htmlspecialchars(strip_tags($this->marca));
            //bind values
            $stmt->bindParam(1, $this->marca);
            if($stmt->execute())
            {
            	return true;
            }
            else
            {
            	return false;
            }
        }
        public function AtualizarMarca()
        {
        	$query = "UPDATE ".$this->tbl_marcas." SET mar_nome = ?, mar_status = 0 WHERE mar_id = ?";
            $stmt = $this->conn->prepare($query);
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->marcaId=htmlspecialchars(strip_tags($this->marcaId));
            //bind values
            $stmt->bindParam(1, $this->nome);
            $stmt->bindParam(2, $this->marcaId);
            if($stmt->execute())
            {
            	return true;
            }
            else
            {
            	return false;
            }
        }
        public function AbrirMarca()
        {
        	$query = "SELECT * FROM ".$this->tbl_marcas." WHERE mar_id = ?";
        	$stmt = $this->conn->prepare($query);
        	$this->marcaId=htmlspecialchars(strip_tags($this->marcaId));
            $stmt->bindParam(1, $this->marcaId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->produtoId = $row["mar_id"];
            $this->nome = $row["mar_nome"];
            switch($row["mar_status"])
            {
            	case "0" :
            		$this->status = "Marca Ativada";
            		break;
        		case "1" :
        			$this->status = "Marca Desativada";
        			break;
            }
        }
        public function ListarTodas()
		{
			$query = "SELECT * FROM ".$this->tbl_marcas." ORDER BY mar_status ASC";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			echo "<div class='table-responsive'>";
			echo "<table class='table table-condensed table-hover'>";
			if($num>0)
			{
				
				echo "<tr>";
				echo "<th>Marcas</th>";
				echo "<th>Status</th>";
				echo "<th>Ações</th>";
				echo "</tr>";
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					echo "<tr>";
					echo "<td style='vertical-align: middle;'>";
					echo $row["mar_nome"];
					echo "</td>";
					echo "<td style='vertical-align: middle;'>";
					if($row["mar_status"]==0)
					{
						echo "Marca Ativada";
					}
					else
					{
						echo "Marca Desativada";
					}
					echo "</td>";
					echo "<td>";
					echo "<a href='./?pagina=Admin&admin=Atualizar-Marca&marca=".$row["mar_id"]."' class='btn btn-primary'> <span class='glyphicon glyphicon-pencil'></span> Atualizar</a> ";
					echo "<a href='#' id='funcao' action='apagar-marca' data-name='".$row["mar_nome"]."' delete-id='".$row["mar_id"]."' class='btn btn-danger' > <span class='glyphicon glyphicon-trash'></span> Apagar</a>";
					echo "</td>";
				}
			}
			echo "</table>";
			echo "</div>";
		}
		public function DesativarMarca()
        {
        	$query = "UPDATE ".$this->tbl_marcas." SET mar_status = 1 WHERE mar_id = ?";
        	$stmt = $this->conn->prepare($query);
        	$this->marcaId=htmlspecialchars(strip_tags($this->marcaId));
        	$stmt->bindParam(1, $this->marcaId);
            if($stmt->execute())
            {
            	return true;
            }
            else
            {
            	return false;
            }
        }
        public function AvisoSucessoCadastro()
		{
			echo "<div class='alert alert-success' role='alert'><center>Marca Cadastrada com Sucesso! <br/> <strong><a href='./?pagina=Admin&admin=Index'>Retornar a página principal </a></strong></center></div>";
		}
		public function AvisoErroCadastro()
		{
			echo "<div class='alert alert-danger' role='alert'><center>Falha ao cadastrar a Marca desejada! <br/> <strong><a href='./?pagina=Admin&admin=Index'>Retornar a página principal </a></strong></center></div>";
		}
		public function AvisoSucessoAtualizar()
		{
			echo "<div class='alert alert-success' role='alert'><center>Marca Cadastrada com Sucesso! <br/> <strong><a href='./?pagina=Admin&admin=Index'>Retornar a página principal </a></strong></center></div>";
		}
		public function AvisoErroAtualizar()
		{
			echo "<div class='alert alert-danger' role='alert'><center>Falha ao atualizar a Marca desejada! <br/> <strong><a href='./?pagina=Admin&admin=Index'>Retornar a página principal </a></strong></center></div>";
		}
	}
		