<h2>Shopping Cart</h2>

<?php 
foreach($this->cart->contents() as $dataItem): 
	echo $dataItem['id'] . '<br/>';
echo form_open('cart/update');?>
	<input type="text" name="qty" value="<?=$dataItem['qty']?>"/> <br/>
<?php
	echo $dataItem['name'] . '<br/>';
	echo $dataItem['price'] . '<br/>';
?>
	<input type="hidden" name="id" value="<?= $dataItem['id']?>"/> <br/>

 <input type="submit" name="submit" value="Update" /><br/>
 </form>
<?php endforeach ?>
<?php echo '<h2>Total ' . $this->cart->total() . '</h2>'; ?>

