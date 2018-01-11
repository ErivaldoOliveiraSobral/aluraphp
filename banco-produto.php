<?php 
	function listaProdutos($conexao){
		$produtos = array();
		$result = mysqli_query($conexao,"select p.*,c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id=c.id;");
	
		while ($produto = mysqli_fetch_assoc($result)) {
			array_push($produtos, $produto);
		}
		return $produtos;
	}

	function insereProduto($conexao,$nome,$preco,$descricao,$categoria_id,$usado){
		$nome = mysqli_real_escape_string($conexao, $nome);
		$descricao = mysqli_real_escape_string($conexao, $descricao);
		$preco = mysqli_real_escape_string($conexao, $preco);
		//escrever query
		$query = "insert into produtos (nome,preco,descricao,categoria_id,usado) values ('{$nome}','{$preco}','{$descricao}','{$categoria_id}','{$usado}');";
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
		return mysqli_fetch_assoc($resultado);
	}

	function alteraProduto($conexao,$id,$nome,$preco,$descricao,$categoria_id,$usado){
		$nome = mysqli_real_escape_string($conexao, $nome);
		$descricao = mysqli_real_escape_string($conexao, $descricao);
		$preco = mysqli_real_escape_string($conexao, $preco);
		$query = "update produtos set nome='{$nome}',preco={$preco},descricao='{$descricao}',categoria_id={$categoria_id},usado={$usado} where id='{$id}'";
		return mysqli_query($conexao,$query);
	}