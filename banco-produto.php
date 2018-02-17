<?php 
	require_once("conecta.php");

function listaProdutos($conexao){
	$produtos = array();
	$result = mysqli_query($conexao,"select p.*,c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id=c.id;");

	while ($produto_array = mysqli_fetch_assoc($result)) {

		$id = $produto_array['id'];
		$nome = $produto_array['nome'];
		$preco = $produto_array['preco'];
		$descricao = $produto_array['descricao'];
		$categoria_nome = $produto_array['categoria_nome'];
		$usado = $produto_array['usado'];

		$categoria = new Categoria();
		$categoria->setNome($categoria_nome);

		$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
		$produto->setId($id);

		array_push($produtos, $produto);
	}

	return $produtos;
}

function insereProduto($conexao,Produto $produto){
	$nome = mysqli_real_escape_string($conexao, $produto->getNome());
	$descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
	$preco = mysqli_real_escape_string($conexao, $produto->getPreco());
	//escrever query
	$query = "insert into produtos (nome,preco,descricao,categoria_id,usado) values ('{$nome}','{$preco}','{$descricao}','{$produto->getCategoria()->getId()}','{$produto->isUsado()}');";
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

	$id = $produto_buscado['id'];
	$nome = $produto_buscado['nome'];
	$preco = $produto_buscado['preco'];
	$descricao = $produto_buscado['descricao'];
	$categoria_id = $produto_buscado['categoria_id'];
	$usado = $produto_buscado['usado'];

	$categoria = new Categoria();
	$categoria->setId($categoria_id);

	$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
	$produto->setId($id);

	return $produto;
}

function alteraProduto($conexao, Produto $produto){
	$nome = mysqli_real_escape_string($conexao, $produto->getNome());
	$descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
	$preco = mysqli_real_escape_string($conexao, $produto->getPreco());
	$query = "update produtos set nome='{$nome}',preco={$preco},descricao='{$descricao}',categoria_id={$produto->getCategoria()->getId()},usado={$produto->isUsado()} where id='{$produto->getId()}'";
	return mysqli_query($conexao,$query);
}