<h1>Edit Product</h1>

<?php
       	echo $this->Form->create($product);
	    echo $this->Form->input('product_name');
	    echo $this->Form->button(__('Update Product'));
	    echo $this->Form->end();
?>