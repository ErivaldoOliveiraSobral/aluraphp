<?php
	session_start();
	
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$mensagem = $_POST["mensagem"];

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'vendor/autoload.php';

	$hotmail = "erivaldo_alemao@hotmail.com";
	$gmail = "erivaldooliveirasobral@gmail.com";

try {
	
	$mail = new PHPMailer(true);

	$mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $gmail;
	$mail->Password = "JacquelineErivaldo";
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to (587 ou 465)

	$mail->setFrom($gmail, "Alura Curso PHP e MySQL");
	$mail->addAddress($hotmail);
	$mail->Subject = "Email de contato da loja";
	$mail->msgHTML("<html>De: {$nome} <br />Email: {$email} <br />Mensagem: {$mensagem}</html>");
	$mail->AltBody = "De: {$nome}\nEmail: {$email}\nMensagem: {$mensagem}";

	if ($mail->send()) {
		$_SESSION["success"] = "Mensagem enviada com sucesso!";
		header("Location: contato.php");
	} else {
		$_SESSION["danger"] = "Erro ao enviar mensagem: ". $mail->ErrorInfo;
		header("Location: contato.php");
	}
} catch (Exception $e){
	$_SESSION["danger"] = "Erro ao enviar mensagem: ". $mail->ErrorInfo;
	echo $e;
	header("Location: contato.php");
}