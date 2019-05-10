<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
            <table border="1" align="center">

                <tr>
                    <th colspan="3"><h1>Product</h1></br>

                        <p><?= $this->Html->link("Add New Product", ['controller'=>'Products', 'action' => 'add']) ?></p></br></br>

                        <span style="color:red"><?= $this->Flash->render('flash') ?> </span></br>    
                    
                    </th>
                </tr>

                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>asd</th>
                </tr>

                <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                       <?= $this->Html->link($product->id, ['action' => 'view']) ?>
                    </td>

                    <td>
                       <?= $product->name ?>
                    </td>
                </tr>

                <?php endforeach; ?>

            </table>

    </body>
</html>