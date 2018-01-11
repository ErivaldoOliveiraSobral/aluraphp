<?php
    error_reporting(E_ALL ^ E_NOTICE);
    include("mostra-alerta.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Minha loja</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/loja.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">Minha Loja</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="produto-formulario.php">Adiciona Produto<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produto-lista.php">Produtos</a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" href="sobre.php">Sobre</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
    <div class="container">
        <div class="principal">
            <?php 
                mostraAlerta("success");
                mostraAlerta("danger");
            ?>
<!--Fim cabeçalho-->