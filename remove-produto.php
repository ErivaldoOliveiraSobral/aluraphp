<?php 
	require_once("cabecalho.php");
	require_once("banco-produto.php");
	require_once("logica-usuario.php");

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