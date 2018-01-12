<?php require_once("cabecalho.php"); ?>

	<form action="envia-contato.php" method="POST">
		<table class="table">
			<tr>
				<td>Nome</td>
				<td><input type="text" name="nome" class="form-control"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" class="form-control"></td>
			</tr>
			<tr>
				<td>Mensagem</td>
				<td><textarea name="mensagem" class="form-control"></textarea></td>
			</tr>
		</table>
		<tr>
			<td><button type="submit" class="btn btn-primary">Enviar</button></td>
		</tr>
	</form>

<?php require_once("rodape.php"); ?>