<?php 
	include("cabecalho.php");
	include('conecta.php');
	include('banco-produto.php');
	include('logica-usuario.php');

	//Proteje para que não seja adicionado sem que o usuário estaja logado
	verificaUsuario();

	//variáveis
	$nome = $_POST["nome"];
	$preco = $_POST["preco"];
	$descricao = $_POST['descricao'];
	$categoria_id = $_POST['categoria_id'];
	if(array_key_exists('usado', $_POST)){
		$usado = 1;
	} else {
		$usado = 0;
	}
			
	//verificar resultado
	if(insereProduto($conexao,$nome,$preco,$descricao,$categoria_id,$usado)){
		?>
			<p class="alert-success">Produto <?= $nome ?>, R$ <?= $preco ?> adicionado com sucesso!</p>
		<?php
	} else {
		$mensagem_de_erro = mysqli_error($conexao);
		?>
			<p class="alert-danger">Produto <?= $nome ?> não adicionado!</p>
			<p class="text-danger">Motivo: <?= $mensagem_de_erro ?></p>
		<?php
	}

	include("rodape.php"); 
?>