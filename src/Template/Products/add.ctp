<!DOCTYPE html>
<html>
	<h1>Add Product</h1>

	</html>
	<?php
	    echo $this->Form->create($product);
	    echo $this->Form->input('product_name');
	    echo $this->Form->input('uom.0.uom_name');
	    echo $this->Form->input('uom.0.price');
	    echo $this->Form->button(__('Save Product'));
	    echo $this->Form->end();
	?>
</html>