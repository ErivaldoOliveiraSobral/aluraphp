<?php 
	require_once("cabecalho.php");
	require_once("banco-produto.php");
	require_once("logica-usuario.php");
	require_once("class/Produto.php");
	require_once("class/Categoria.php");

	//Proteje para que não seja adicionado sem que o usuário estaja logado
	verificaUsuario();

	//Objetos
	$produto = new Produto();
	$categoria = new Categoria();
	$categoria->id = $_POST['categoria_id'];

	$produto->nome = $_POST["nome"];
	$produto->preco = $_POST["preco"];
	$produto->descricao = $_POST['descricao'];
	$produto->categoria = $categoria;
	
	if(array_key_exists('usado', $_POST)){
		$produto->usado = 1;
	} else {
		$produto->usado = 0;
	}



			
	//verificar resultado
	if(insereProduto($conexao, $produto)){
		?> 
			<p class="text-success">Produto <?= $produto->nome ?>, R$ <?= $produto->preco ?> adicionado com sucesso!</p>
		<?php
	} else {
		$mensagem_de_erro = mysqli_error($conexao);
		?>
			<p class="text-danger">Produto <?= $produto->nome ?> não adicionado!</p>
			<p class="text-danger">Motivo: <?= $mensagem_de_erro ?></p>
		<?php
	}

	include("rodape.php"); 
?>