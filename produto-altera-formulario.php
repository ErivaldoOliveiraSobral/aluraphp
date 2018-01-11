<?php 
	include("cabecalho.php");
	include("conecta.php");
	include("banco-categoria.php");
	include("banco-produto.php");

	$id = $_GET['id'];
	$produto = buscaProduto($conexao,$id);
	$categorias = listarCategorias($conexao);
	$usado = $produto['usado'] ? "checked='checked'":"";
?>

	<h1>Alterando Produtos</h1>
	<form action="altera-produto.php" method="POST">
		<input type="hidden" name="id" value="<?=$produto['id']?>">
		<table class="table">
			
			<?php include("produto-formulario-base.php"); ?>
			
		</table>
		<tr>
			<td><button class="btn btn-primary" type="submit">Alterar</button></td>
		</tr>
	</form>

<?php include("rodape.php"); ?>