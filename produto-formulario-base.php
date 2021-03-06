<tr>
	<td>Nome:</td>
	<td><input class="form-control" type="text" name="nome" value="<?= $produto->nome ?>"></td> 
</tr>
<tr>
	<td>Preço:</td>
	<td><input class="form-control" type="number" step="0.01" name="preco" value="<?= $produto->preco ?>"></td>
</tr>
<tr>
	<td>Descrição:</td>
	<td><input class="form-control" type="text" name="descricao" value="<?= $produto->descricao ?>"></td>
</tr>
<tr>
	<td></td>
	<td><input class="form-control" type="checkbox" name="usado" <?=$produto->usado?>" value="true"> Usado</td>
</tr>
<tr>
	<td>Categoria:</td>
	<td>
		<select name="categoria_id" class="form-control">
			<?php foreach ($categorias as $categoria) :
				$essaEhACategoria = $produto->categoria->id == $categoria->id;
				$selecao = $essaEhACategoria ? "selected='selected'":"";
			?>
			<option value="<?= $categoria->id ?>" <?=$selecao?>>
				<?= $categoria->nome ?>
			</option>
		<?php endforeach ?>
		</select>
	</td>
</tr>