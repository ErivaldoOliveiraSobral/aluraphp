<?php 
	require_once("cabecalho.php");
	require_once("banco-categoria.php");
	require_once("logica-usuario.php");
	require_once("class/Produto.php");
	require_once("class/Categoria.php");
	
	$categorias = listarCategorias($conexao);
	verificaUsuario();
	
	$produto = new Produto();
	$categoria = new Categoria();
	$categoria->id = "1";
	$produto->categoria = $categoria;

	//$produto = array('nome' => "", "descricao" => "", "preco" => "", "categoria_id" => "1");
	//$usado = "";
?>
	
	<h1>Formulário de Produtos</h1>
	<form action="adiciona-produto.php" method="POST">
		<table class="table">
			
			<?php include("produto-formulario-base.php") ?>

		</table>
		<tr>
			<td><button class="btn btn-primary" type="submit" name="Cadastrar" value="Cadastrar">Cadastrar</button></td>
		</tr>
	</form>

<?php include("rodape.php"); ?>