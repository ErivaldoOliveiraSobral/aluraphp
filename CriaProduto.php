<?php
	require_once('class/Produto.php');

	$livro = new Produto();

	$livro->nome = "Livro de PHP";
	$livro->descricao = "Livro de OO";

	var_dump($livro);

?>