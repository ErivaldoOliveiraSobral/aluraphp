<?php
require_once('class/Produto.php');
require_once('class/Categoria.php');
require_once('class/Livro.php');

$categoria = new Categoria();
$categoria->setNome("Esporte");

$livro = new Livro("Outro Livro","100,00","Game of Thrones",$categoria,"1");
$produto = new Produto("Livro","55,00","Thrones",$categoria,"0");
var_dump($livro->temIsbn());
die();
/*
	$categoria = new Categoria();
	$categoria->setNome("Escolar");
	$categoria2 = new Categoria();
	$categoria2->setNome("Literatura");

	$produto1 = new Produto("Livro", "55,99", "Soft Skills", $categoria, "0");
	$produto2 = new Produto("Outro Livro","100,00","Game of Thrones",$categoria2,"1");

	echo $produto1;
	echo $produto2;

	echo $produto1->getCategoria()->getNome();
	echo "<br />";
	echo $produto2->getCategoria();
*/
	$produto = new Produto();
	var_dump($produto);
	die();
?>