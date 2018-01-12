<?php

session_start();

function verificaUsuario() {
	if (!usuarioEstaLogado()) {
		$_SESSION["danger"] = "Você não tem acesso a esta funcionalidade!";
		header("Location: index.php");
		die();
	}
}

function usuarioEstaLogado() {
	return isset($_SESSION["usuario_logado"]);
	//return isset($_COOKIE["usuario_logado"]);
}

function usuarioLogado() {
	return $_SESSION["usuario_logado"];
	//return $_COOKIE["usuario_logado"];
}

function logaUsuario($email) {
	$_SESSION["usuario_logado"] = $email;
	//return setcookie("usuario_logado", $email, time()+60);
}

function logout() {
	session_destroy();
	session_start();
}