<?php 
	include('cabecalho.php');
	include('conecta.php');
	include('banco-produto.php');
	include("logica-usuario.php");

	$id = $_POST['id'];

	if (removeProduto($conexao,$id)) {
		$_SESSION["success"] = "Produto removido com sucesso!";
		header("Location: produto-lista.php");
		die();
	} else {
		?>
			<p class="text-danger">Produto não removido!</p>
		<?php
	}
	



?>