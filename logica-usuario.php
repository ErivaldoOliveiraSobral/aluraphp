<?php

session_start();

/*
* Retorna TRUE em $_GET["falhaDeSeguranca"] e rdireciona para index.php, caso o usuário não esteja logado
*/
function verificaUsuario() {
	if (!usuarioEstaLogado()) {
		header("Location: index.php?falhaDeSeguranca=true");
		die();
	}
}

 /*
 * Verifica se o COOKIE esta setado
 */
function usuarioEstaLogado() {
	return isset($_SESSION["usuario_logado"]);
	//return isset($_COOKIE["usuario_logado"]);
}

/*
* Retorna o COOKIE do usuário logado
*/
function usuarioLogado() {
	return $_SESSION["usuario_logado"];
	//return $_COOKIE["usuario_logado"];
}


/*
* Seta o $_COOKIE["usuario_logado"] com o valor recebido por parânmetro e um time-out de 60 segundos
*/
function logaUsuario($email) {
	$_SESSION["usuario_logado"] = $email;
	//return setcookie("usuario_logado", $email, time()+60);
}

/*
* 
*/
function usuarioNaoAutorizado() {
	if (isset($_GET["falhaDeSeguranca"])) {
			?><p class="alert-danger">Não Autorizado</p><?php
		}
}

function validarLogin() {
	if (isset($_GET["login"]) && $_GET["login"] == true){
		?><p class="alert-success">Logado com sucesso</p><?php
	}
	if (isset($_GET["login"]) && $_GET["login"] == false){
		?><p class="alert-danger">Usuário ou senha inválida</p><?php
	}
}