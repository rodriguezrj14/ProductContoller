
<!DOCTYPE html>
<html>
    <head>
        

    <body>
             <table class='table'>

                <tr>
                    <th colspan="3"><h1>Product</h1><br>

                        <?= $this->Html->link("Add New Product", ['controller'=>'Products', 'action' => 'add']) ?><br>

                        <span style="color:red"><?= $this->Flash->render('flash') ?> </span><br>    
                    
                    </th>
                </tr>

                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Action</th>

                </tr>

                <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                       <?= $this->Html->link($product->id, ['action' => 'view', $product->id]) ?>
                    </td>
                    <td>
                        <?= $product->product_name ?>
                    </td>
                    <td>
                        <?= $this->Html->link('Edit', ['action' => 'edit', $product->id]) ?>
                        <?= $this->Form->postLink(
                            'Delete',
                            ['action' => 'delete', $product->id],
                            ['confirm' => 'Are you sure'])
                            ?>
                    </td>
                    
                </tr>

                <?php endforeach; ?>

            </table>


    </body>
</html>