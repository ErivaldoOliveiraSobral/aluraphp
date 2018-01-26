<?php
	require_once('class/Produto.php');
	require_once("banco-produto.php");

	$livro = new Produto();

	$livro->nome = "Livro de PHP";
	$livro->descricao = "Livro de OO";
	$livro->preco = "10";
	$livro->usado = 1;
	$livro->categoria_id = 2;

	insereProduto($conexao, $livro);

?>