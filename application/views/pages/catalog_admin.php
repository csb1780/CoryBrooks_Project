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
	echo form_open('catalog/updateInv') ?>
	<table>
		<tr>
			<td>
				<input type="text" name="sku" value="<?= $item['sku'] ?>"/>
				<input type="hidden" name="id" value="<?= $item['sku'] ?>"/>
			</td>
			<td>
				<input type="text" name="qty" value="<?= $item['qty'] ?>" />
			</td>
			<td>
				<input type="text" name="price" value="<?= $item['price'] ?>"/>
			</td>
			<td>
				<input type="text" name="name" value="<?= $item['name'] ?>"/>
			</td>
			<td>
			<input type="submit" name="submit" value="Update" />
			</td>
			
		</tr>
	</table>
</form>
<?php endforeach ?>
<h2>Add New Item</h2>
<?php echo form_open('catalog/addInv') ?>
	<table>
		<tr>
			<td>
				<input type="text" name="sku" />
			</td>
			<td>
				<input type="text" name="qty" />
			</td>
			<td>
				<input type="text" name="price" />
			</td>
			<td>
				<input type="text" name="name" />
			</td>
			<td>
			<input type="submit" name="submit" value="Add" />
			</td>
			
		</tr>
	</table>
</form>