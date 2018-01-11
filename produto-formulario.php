<?php 
	include("cabecalho.php");
	include("conecta.php");
	include("banco-categoria.php");
	include("logica-usuario.php");
	
	$categorias = listarCategorias($conexao);
	verificaUsuario();
	$produto = array('nome' => "", "descricao" => "", "preco" => "", "categoria_id" => "1");
	$usado = "";
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