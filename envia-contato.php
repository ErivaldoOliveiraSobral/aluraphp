<?php
	session_start();
	
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$mensagem = $_POST["mensagem"];

	require("PHPMailer.php");

	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "erivaldooliveirasobral@gmail.com";
	$mail->Password = "JacquelineErivaldo";

	$mail->setFrom("erivaldooliveirasobral@gmail.com", "Alura Curso PHP e MySQL");
	$mail->addAddress("erivaldooliveirasobral@gmail.com");
	$mail->Subject = "Email de contato da loja";
	$mail->msgHTML("<html>De: {$nome} <br />Email: {$email} <br />Mensagem: {$mensagem}</html>");
	$mail->AltBody = "De: {$nome}\nEmail: {$email}\nMensagem: {$mensagem}";

	if ($mail->send()) {
		$_SESSION["success"] = "Mensagem enviada com sucesso!";
		header("Location: index.php");
	} else {
		$_SESSION["danger"] = "Erro ao enviar mensagem ".$mail->ErrorInfo;
		header("Location: contato.php");
	}