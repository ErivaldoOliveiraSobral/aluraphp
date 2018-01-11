<?php 
	include("cabecalho.php");
	include("conecta.php");
	include("banco-categoria.php");
	include("logica-usuario.php");


	$categorias = listarCategorias($conexao);
	
	//Verifica se usuário esta logado
	verificaUsuario();

?>
	<table class="table">
		<h1>Formulário de Produtos</h1>
		<form action="adiciona-produto.php" method="POST">
			<tr>
				<td>Nome:</td> 
				<td><input type="text" name="nome" class="form-control"></td>
			</tr>
			<tr>
				<td>Preço:</td>
				<td><input type="number" name="preco" class="form-control"></td>
			</tr>
			<tr>
				<td>Descrição:</td>
				<td><textarea name="descricao" class="form-control"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="checkbox" name="usado" value="true"> Usado</td>
			</tr>
			<tr>
				<td>Categoria</td>
				<td>
					<select name="categoria_id" class="form-control">
					<?php foreach ($categorias as $categoria): ?>
					<option value="<?=$categoria['id']?>"><?=$categoria['nome']?></option>
					<?php endforeach ?>
					</select>
				</td>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Cadastrar" value="Cadastrar" class="btn btn-primary"></td>
			</tr>
		</form>
	</table>
<?php include("rodape.php"); ?>