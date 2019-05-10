<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>

        <table border="1" align="center">
            <tr>
                <?php foreach ($query as $value): ?>
                    <th colspan = "4"><h1>View Product</h1><br>
                            <?= $this->Html->link("Add UOM", ['controller'=>'Products', 'action' => 'adduom', $value->id]) ?><br>
                            <br>  
                    </th>
                <?php endforeach; ?>
            </tr> 

            <tr>
                <th>Product Name</th>
                <th>Unit of Measure</th>
                <th>Price</th>
                <th>Action</th>
            </tr>

            <?php foreach ($query as $value): ?>
                <?php foreach ($value->uom as $uom): ?>
                    <tr>
                        <td><?= h($value->product_name)?></td>
                        <td><?= h($uom->uom_name)?></td>
                        <td><?= h($uom->price)?></td>
                        <td><?= $this->Html->link('Edit', ['action' => 'edituom', $uom->product_id, $uom->id]) ?>
                            <?= $this->Form->postLink(
                            'Delete',
                            ['action' => 'deleteuom', $uom->id],
                            ['confirm' => 'Are you sure'])
                            ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
            

            <tr>
                <td colspan="4" align="right"><?= $this->Html->link('Back', ['controller' => 'Products', 'action' => 'index']) ?></td>
            </tr>
        </table>
    </body>
</html>