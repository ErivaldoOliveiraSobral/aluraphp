<?php 
	require_once("cabecalho.php");
	require_once("logica-usuario.php");

	//Proteje para que não seja adicionado sem que o usuário estaja logado
	verificaUsuario();

	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$descricao = $_POST['descricao'];
	$categoria_id = $_POST['categoria_id'];

	$categoria = new Categoria();
	$categoria->setId($categoria_id);

	if(array_key_exists('usado', $_POST)){
		$usado = 1;
	} else {
		$usado = 0;
	}

	$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

	$produtoDAO = new ProdutoDAO($conexao);

	//verificar resultado
	if($produtoDAO->insereProduto($produto)){
		?> 
			<p class="text-success">Produto <?= $produto->getNome() ?>, R$ <?= $produto->getPreco() ?> adicionado com sucesso!</p>
		<?php
	} else {
		$mensagem_de_erro = mysqli_error($conexao);
		?>
			<p class="text-danger">Produto <?= $produto->getNome() ?> não adicionado!</p>
			<p class="text-danger">Motivo: <?= $mensagem_de_erro ?></p>
		<?php
	}

	include("rodape.php"); 
?>