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
			<td><b>USADO</b></td>
		</tr>
		<?php 
			$produtos = listaProdutos($conexao);
			foreach ($produtos as $produto):
		?>
		<tr>
			<td><?= $produto->getNome()?></td>
			<td>R$ <?=$produto->getPreco()?></td>
			<td>R$ <?=$produto->precoComDesconto(30)?></td>
			<td><?=substr($produto->getDescricao(),0,40)?></td>
			<td><?=$produto->getCategoria()->getNome()?></td>
			<td>
				<?php
					
					if($produto->isUsado()) {
						//echo "sim";
						?><input class="form-control" type="checkbox" name="usado" checked="checked" disabled="true"><?php
					} else {
						//echo "não";
						?><input class="form-control" type="checkbox" name="usado" disabled="true"><?php
					}

					//print $produto->isUsado() ? "<input class='form-control' type='checkbox' name='usado' checked='checked' disabled='true'>":"<input class='form-control' type='checkbox' name='usado' disabled='true'>";
				?>
			</td>
			<td><a href="produto-altera-formulario.php?id=<?=$produto->getId()?>" class="btn btn-primary">Alterar</a>
			<td>
				<form action="remove-produto.php" method="POST">
					<input type="hidden" name="id" value="<?=$produto->getId()?>">
					<button class="btn btn-danger">Remover</button>
				</form>
		</tr>
		
		<?php 
			endforeach 
		?>
	
	</table>

<?php include("rodape.php"); ?>