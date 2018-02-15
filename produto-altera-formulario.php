<?php 
	require_once("cabecalho.php");
	require_once("banco-categoria.php");
	require_once("banco-produto.php");
	require_once("class/Produto.php");

	$id = $_GET['id'];
	$produto_array = buscaProduto($conexao,$id);

	$produto = new Produto();
	$categoria = new Categoria();
	$categoria->id = $produto_array['categoria_id'];

	$produto->id = $produto_array['id'];
	$produto->nome = $produto_array["nome"];
	$produto->preco = $produto_array["preco"];
	$produto->descricao = $produto_array['descricao'];
	$produto->categoria = $categoria;

	$categorias = listarCategorias($conexao);
	$produto->usado = $produto_array['usado'] ? "checked='checked'":"";
?>

	<h1>Alterando Produtos</h1>
	?>
	<form action="altera-produto.php" method="POST">
		<input type="hidden" name="id" value="<?=$produto->id?>">
		<table class="table">
			
			<?php include("produto-formulario-base.php"); ?>
			
		</table>
		<tr>
			<td><button class="btn btn-primary" type="submit">Alterar</button></td>
		</tr>
	</form>

<?php include("rodape.php"); ?>