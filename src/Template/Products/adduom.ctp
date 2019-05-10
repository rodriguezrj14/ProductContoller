<h1>Add UOM</h1>

<?php
        echo $this->Form->create($product);
		echo $this->Form->input('uom.0.uom_name');
	   	echo $this->Form->input('uom.0.price');
		echo $this->Form->button(__('Add UOM'));
		echo $this->Form->end();
?>