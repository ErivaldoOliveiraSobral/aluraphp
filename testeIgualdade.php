<?php

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

?>