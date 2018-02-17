<?php 
	require_once("cabecalho.php");

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$descricao = $_POST['descricao'];
	$categoria_id = $_POST['categoria_id'];
	$isbn = $_POST['isbn'];
	$tipoProduto = $_POST['tipo_produto'];
	
	$categoria = new Categoria();
	$categoria->setId($categoria_id);
	
	if(array_key_exists('usado', $_POST)){
		$usado = 1;
	} else {
		$usado = 0;
	}

	$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
	$produto->setId($id);
	$produto->setIsbn($isbn);
	$produto->setTipoProduto($tipoProduto);

	$produtoDAO = new ProdutoDAO($conexao);

	if($produtoDAO->alteraProduto($produto)){
		?>
			<p class="text-success">Produto <?= $produto->getNome() ?>, R$ <?= $produto->getPreco() ?> alterado com sucesso!</p>
		<?php
	} else {
		$mensagem_de_erro = mysqli_error($conexao);
		?>
			<p class="alert-danger">Produto <?= $produto->getNome() ?> não foi alterado!</p>
			<p class="text-danger">Motivo: <?= $mensagem_de_erro ?></p>
		<?php
	}

	include("rodape.php"); 
?>