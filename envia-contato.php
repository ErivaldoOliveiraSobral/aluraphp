<?php
	session_start();
	
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$mensagem = $_POST["mensagem"];

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'vendor/autoload.php';
	$gmail = 'erivaldooliveirasobral@gmail.com';

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

	$mail->setFrom($email, "Curso PHP e MySQL");
	$mail->addAddress($gmail, "Erivaldo");
	$mail->Subject = "Email de contato";
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
	header("Location: contato.php");
}