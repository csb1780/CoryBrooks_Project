<h2>Catalog Page</h2>

<style type="text/css">
.heading
{
font-size: 30px;
font-weight: bold;
}
td
{
	width:202px;
	height: 38px;
}
</style>

<table>
		<tr>
			
			<td class="heading" width="200">Sku</td>
			<td class="heading" width="200">Qty</td>
			<td class="heading" width="200">Price</td>
			<td class="heading" width="200">Name</td>
			
		</tr>
</table>

<?php foreach ($products as $item): 
	echo form_open('cart/addItems') ?>
	<table>
		<tr>
			<td>
				<label for="id"><?= $item['sku'] ?></label>
				<input type="hidden" name="id" value="<?= $item['sku'] ?>"/>
			</td>
			<td>
				<input type="text" value="1" name="qty"/>
			</td>
			<td>
				<label for="price"><?= $item['price'] ?></label>
				<input type="hidden" name="price" value="<?= $item['price'] ?>"/>
			</td>
			<td>
				<label for="name"><?= $item['name'] ?></label>
				<input type="hidden" name="name" value="<?= $item['name'] ?>"/>
			</td>
			<td>
			<input type="submit" name="submit" value="Submit" />
			</td>
			
		</tr>
	</table>
</form>
<?php endforeach ?>