<?php
	include("logica-usuario.php");

	logout();
	$_SESSION["success"] = "Usuário deslogado com sucesso!";
	header("Location: index.php");