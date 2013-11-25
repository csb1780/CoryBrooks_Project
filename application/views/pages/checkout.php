<?php
echo validation_errors(); 
echo form_open('checkout/save');?>

First Name: <input type="text" name="fname" value="<?php echo set_value('fname'); ?>"/><br/>
Last Name: <input type="text" name="lname" value="<?php echo set_value('lname'); ?>"value="<?php echo set_value('username'); ?>"/><br/>
Address: <input type="text" name="address" value="<?php echo set_value('address'); ?>"/><br/>
City: <input type="text" name="city" value="<?php echo set_value('city'); ?>"/><br/>
State: <input type="text" name="state" value="<?php echo set_value('state'); ?>" /><br/>
Zip: <input type="text" name="zip" value="<?php echo set_value('zip'); ?>"/><br/>
Email: <input type="text" name="email" value="<?php echo set_value('email'); ?>"/>

<?php echo '<h2>Total ' . $this->cart->total() . '</h2>'; ?>
<input type="hidden" name="total" value="<?= $this->cart->total() ?>"/>
<input type="submit" name="submit" value="Checkout"/>
</form>