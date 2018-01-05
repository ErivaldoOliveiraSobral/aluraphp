<?php 
	include("cabecalho.php");
	include('conecta.php');
	include('banco-produto.php');

	$id = $_POST['id'];
	$nome = $_POST["nome"];
	$preco = $_POST["preco"];
	$descricao = $_POST['descricao'];
	$categoria_id = $_POST['categoria_id'];
	if(array_key_exists('usado', $_POST)){
		$usado = 1;
	} else {
		$usado = 0;
	}
			
	if(alteraProduto($conexao,$id,$nome,$preco,$descricao,$categoria_id,$usado)){
		?>
			<p class="text-success">Produto <?= $nome ?>, R$ <?= $preco ?> alterado com sucesso!</p>
		<?php
	} else {
		$mensagem_de_erro = mysqli_error($conexao);
		?>
			<p class="alert-danger">Produto <?= $nome ?> não foi alterado!</p>
			<p class="text-danger">Motivo: <?= $mensagem_de_erro ?></p>
		<?php
	}

	include("rodape.php"); 
?>