<tr>
	<td>Nome:</td>
	<td><input class="form-control" type="text" name="nome" value="<?= $produto->getNome() ?>"></td> 
</tr>
<tr>
	<td>Preço:</td>
	<td><input class="form-control" type="number" step="0.01" name="preco" value="<?= $produto->getPreco() ?>"></td>
</tr>
<tr>
	<td>Descrição:</td>
	<td><input class="form-control" type="text" name="descricao" value="<?= $produto->getDescricao() ?>"></td>
</tr>
<tr>
	<td></td>
	<td><input class="form-control" type="checkbox" name="usado" <?=$produto->isUsado()?>> Usado</td>
</tr>
<tr>
	<td>Categoria:</td>
	<td>
		<select name="categoria_id" class="form-control">
			<?php foreach ($categorias as $categoria) :
				$essaEhACategoria = $produto->getCategoria()->getId() == $categoria->getId();
				$selecao = $essaEhACategoria ? "selected='selected'":"";
			?>
			<option value="<?= $categoria->getId() ?>" <?=$selecao?>>
				<?= $categoria->getNome() ?>
			</option>
		<?php endforeach ?>
		</select>
	</td>
</tr>