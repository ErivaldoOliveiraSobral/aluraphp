<?php include("cabecalho.php"); ?>

	<h1>Bem Vindo</h1>

	<h2>Login</h2>
	<?php
		if (isset($_GET["login"]) && $_GET["login"] == true){
			?>
			<p class="alert-success">Logado com sucesso</p>
			<?php
		}
		if (isset($_GET["login"]) && $_GET["login"] == false){
			?>
			<p class="alert-danger">Usuário ou senha inválida</p>
			<?php
		}
	?>
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
			<tr>
				<td><button type="submit" class="btn btn-primary">Entrar</button></td>
			</tr>
		</table>
	</form>

<?php include("rodape.php"); ?>