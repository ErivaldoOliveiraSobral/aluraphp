<?php 
	require_once("cabecalho.php");
	require_once("banco-produto.php");
	require_once("class/Produto.php");
	require_once("class/Categoria.php");

	$produto = new Produto();
	$categoria = new Categoria();
	$categoria->id = $_POST['categoria_id'];

	$produto->id = $_POST['id'];
	$produto->nome = $_POST["nome"];
	$produto->preco = $_POST["preco"];
	$produto->descricao = $_POST['descricao'];
	$produto->categoria = $categoria;
	
	if(array_key_exists('usado', $_POST)){
		$produto->usado = 1;
	} else {
		$produto->usado = 0;
	}
			
	if(alteraProduto($conexao,$produto)){
		?>
			<p class="text-success">Produto <?= $produto->nome ?>, R$ <?= $produto->preco ?> alterado com sucesso!</p>
		<?php
	} else {
		$mensagem_de_erro = mysqli_error($conexao);
		?>
			<p class="alert-danger">Produto <?= $produto->nome ?> não foi alterado!</p>
			<p class="text-danger">Motivo: <?= $mensagem_de_erro ?></p>
		<?php
	}

	include("rodape.php"); 
?>