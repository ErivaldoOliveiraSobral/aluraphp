<?php 
	require_once("conecta.php");
	require_once("class/Produto.php");
	require_once("class/Categoria.php");

function listaProdutos($conexao){
	$produtos = array();
	$result = mysqli_query($conexao,"select p.*,c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id=c.id;");

	while ($produto_array = mysqli_fetch_assoc($result)) {

		$produto = new Produto();
		$categoria = new Categoria();
		$categoria->setNome($produto_array['categoria_nome']);

		$produto->setId($produto_array['id']);
		$produto->setNome($produto_array['nome']);
		$produto->setPreco((double)$produto_array['preco']);
		$produto->setDescricao($produto_array['descricao']);
		$produto->setCategoria($categoria);
		$produto->setUsado($produto_array['usado']);

		array_push($produtos, $produto);
	}

	return $produtos;
}

function insereProduto($conexao,Produto $produto){
	$nome = mysqli_real_escape_string($conexao, $produto->getNome());
	$descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
	$preco = mysqli_real_escape_string($conexao, $produto->getPreco());
	//escrever query
	$query = "insert into produtos (nome,preco,descricao,categoria_id,usado) values ('{$nome}','{$preco}','{$descricao}','{$produto->getCategoria()->getId()}','{$produto->getUsado()}');";
	//enviar para o banco
	return mysqli_query($conexao,$query);
}

function removeProduto($conexao,$id){
	$query = "delete from produtos where id={$id};";
	return mysqli_query($conexao,$query);
}

function buscaProduto($conexao,$id){
	$query = "select * from produtos where id={$id}";
	$resultado = mysqli_query($conexao,$query);
	$produto_buscado = mysqli_fetch_assoc($resultado);

	$produto = new Produto();
	$categoria = new Categoria();
	$produto->setId($produto_buscado['id']);
	$produto->setNome($produto_buscado['nome']);
	$produto->setPreco($produto_buscado['preco']);
	$produto->setDescricao($produto_buscado['descricao']);
	$categoria->setId($produto_buscado['categoria_id']);
	$produto->setCategoria($categoria);
	$produto->setUsado($produto_buscado['usado']);

	return $produto;
}

function alteraProduto($conexao, Produto $produto){
	$nome = mysqli_real_escape_string($conexao, $produto->getNome());
	$descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
	$preco = mysqli_real_escape_string($conexao, $produto->getPreco());
	$query = "update produtos set nome='{$nome}',preco={$preco},descricao='{$descricao}',categoria_id={$produto->getCategoria()->getId()},usado={$produto->getUsado()} where id='{$produto->getId()}'";
	return mysqli_query($conexao,$query);
}