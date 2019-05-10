<h1>Edit UOM</h1>

<?php

	foreach ($products as $key => $value) {

        echo $this->Form->create($product);
        echo $this->Form->input('uom.0.id', ['value' => $value->_matchingData['Uom']['id']]);
		echo $this->Form->input('uom.0.uom_name', ['value' => $value->_matchingData['Uom']['uom_name']]);
	   	echo $this->Form->input('uom.0.price', ['value' => $value->_matchingData['Uom']['price']]);
		echo $this->Form->button(__('Edit UOM'));
		echo $this->Form->end();
        }

        
?>