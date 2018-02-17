<?php 
	require_once("cabecalho.php");
	require_once("banco-categoria.php");
	require_once("banco-produto.php");
	require_once("class/Produto.php");

	$id = $_GET['id'];
	$produto = buscaProduto($conexao,$id);

	$categorias = listarCategorias($conexao);
	$produto->setUsado($produto->isUsado() ? "checked='checked'":"");
?>

	<h1>Alterando Produtos</h1>

	<form action="altera-produto.php" method="POST">
		<input type="hidden" name="id" value="<?=$produto->getId()?>">
		<table class="table">
			
			<?php include("produto-formulario-base.php"); ?>
			
		</table>
		<tr>
			<td><button class="btn btn-primary" type="submit">Alterar</button></td>
		</tr>
	</form>

<?php include("rodape.php"); ?>