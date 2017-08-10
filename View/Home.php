<?php
	$database = new Database();
	$db = $database->getConnection();
	$calcados = new Calcados($db);
?>
		<div class="container">
			<?php
				$calcados->ListarTudo();
			?>
		</div>