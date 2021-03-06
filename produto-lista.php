<?php 
	require_once("cabecalho.php");
	require_once("banco-produto.php");
?>

	<table class="table table-striped table-bordered"> 		
		
		<tr>
			<td><b>PRODUTO</b></td>
			<td><b>PREÇO</b></td>
			<td><b>C/ DESC</b></td>
			<td><b>DESCRIÇÃO</b></td>
			<td><b>TIPO</b></td>
		</tr>
		<?php 
			$produtos = listaProdutos($conexao);
			foreach ($produtos as $produto):
		?>
		<tr>
			<td><?= $produto->nome?></td>
			<td>R$ <?=$produto->preco?></td>
			<td>R$ <?=$produto->precoComDesconto(50)?></td>
			<td><?=substr($produto->descricao,0,40)?></td>
			<td><?=$produto->categoria->nome?></td>
			<td><a href="produto-altera-formulario.php?id=<?=$produto->id?>" class="btn btn-primary">Alterar</a>
			<td>
				<form action="remove-produto.php" method="POST">
					<input type="hidden" name="id" value="<?=$produto->id?>">
					<button class="btn btn-danger">Remover</button>
				</form>
		</tr>
		
		<?php 
			endforeach 
		?>
	
	</table>

<?php include("rodape.php"); ?>