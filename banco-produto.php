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
		$categoria->nome = $produto_array['categoria_nome'];

		$produto->id = $produto_array['id'];
		$produto->nome = $produto_array['nome'];
		$produto->preco = $produto_array['preco'];
		$produto->descricao = $produto_array['descricao'];
		$produto->categoria = $categoria;
		$produto->usado = $produto_array['usado'];

		array_push($produtos, $produto);
	}

	return $produtos;
}

function insereProduto($conexao,Produto $produto){
	$nome = mysqli_real_escape_string($conexao, $produto->nome);
	$descricao = mysqli_real_escape_string($conexao, $produto->descricao);
	$preco = mysqli_real_escape_string($conexao, $produto->preco);
	//escrever query
	$query = "insert into produtos (nome,preco,descricao,categoria_id,usado) values ('{$nome}','{$preco}','{$descricao}','{$produto->categoria->id}','{$produto->usado}');";
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
	$produto->id = $produto_buscado['id'];
	$produto->nome = $produto_buscado['nome'];
	$produto->preco = $produto_buscado['preco'];
	$produto->descricao = $produto_buscado['descricao'];
	$categoria->id = $produto_buscado['categoria_id'];
	$produto->categoria = $categoria;
	$produto->usado = $produto_buscado['usado'];

	return $produto;
}

function alteraProduto($conexao, Produto $produto){
	$nome = mysqli_real_escape_string($conexao, $produto->nome);
	$descricao = mysqli_real_escape_string($conexao, $produto->descricao);
	$preco = mysqli_real_escape_string($conexao, $produto->preco);
	$query = "update produtos set nome='{$nome}',preco={$preco},descricao='{$descricao}',categoria_id={$produto->categoria->id},usado={$produto->usado} where id='{$produto->id}'";
	return mysqli_query($conexao,$query);
}