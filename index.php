<?php 
	require_once("cabecalho.php"); 
	require_once("logica-usuario.php");
?>

	<h1>Bem Vindo</h1>
	<h2>Login</h2>

	<?php if (usuarioEstaLogado()) { ?>	
			<p class="text-success">Você está logado como <?=usuarioLogado()?></p>
			<a href="logout.php">Sair</a>
	<?php } else { ?>
		<form action="login.php" method="POST">
			<table class="table">
				<tr>
					<td>Email</td>
					<td><input class="form-control" type="email" name="email"></td>
				</tr>
				<tr>
					<td>Senha</td>
					<td><input class="form-control" type="password" name="senha"></td>
				</tr>
			</table>
			<tr>
				<td><button type="submit" class="btn btn-primary">Entrar</button></td>
			</tr>
		</form>
		<?php
	}
?>

<?php include("rodape.php"); ?>