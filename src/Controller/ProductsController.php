<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;

class ProductsController extends AppController
{

	/*public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }*/

    public function index(){

        $products = $this->Products->find();
        $this->set(compact('products'));

        }

    public function view($id = null){

        $products = $this->Products->find()->where(['id' => $id]);
        $query = $products->find('all')->contain(['Uom']);
        $this->set(compact('query'));
        
    }

    public function add(){

        $product = $this->Products->newEntity();

        if($this->request->is('post')){
            $product = $this->Products->patchEntity($product, $this->request->data, [
            	'associated' => ['Uom']
            ]);

            if($this->Products->save($product)){
                $this->Flash->success(__('Your product has been saved.'));
                return $this->redirect(['action' => 'index']);
            }else{
            	$this->Flash->error(__('Unable to add your product'));
            }
        }
        $this->set('product', $product);
        
    }

    public function adduom($id){

        $product = $this->Products->get($id);

        if($this->request->is(['post', 'put'])){
            $this->Products->patchEntity($product, $this->request->data, [
            	'associated' => ['Uom']
            ]);

            if($this->Products->save($product)){
                $this->Flash->success(__('Your UOM has been added '));
                return $this->redirect(['action' => 'view', $id]);
            }else{
            	$this->Flash->error(__('Unable to update your UOM'));
            }
        }
        $this->set('product', $product);
        
    }

    public function edit($id = null){

        $product = $this->Products->get($id);

        if($this->request->is(['post', 'put'])){
            $this->Products->patchEntity($product, $this->request->data);

            if($this->Products->save($product)){
                $this->Flash->success(__('Your product has been updated. '));
                return $this->redirect(['action' => 'index']);
            }else{
            	$this->Flash->error(__('Unable to update your product'));
            }
        }
        $this->set('product', $product);
    }

    public function edituom($id, $uom){

        $product = $this->Products->get($id, ['contain' => 'Uom']);
        
        $products = $this->Products->find('all')
        			->contain(['Uom'])
        			->matching('Uom')
        			->where([
        				'Uom.id' => $uom,
        				'Uom.product_id' => $id
        			]);
        $this->set(compact('products'));

        if($this->request->is(['post', 'put'])){
            $this->Products->patchEntity($product, $this->request->data, [
            	'associated' => ['Uom']
            ]);

            if($this->Products->save($product)){
                $this->Flash->success(__('Your UOM has been updated. '));
                return $this->redirect(['action' => 'view', $id]);
            }else{
            	$this->Flash->error(__('Unable to update your UOM'));
            }
        }
        $this->set('product', $product);
    }

    public function delete($id){

        $this->request->allowMethod(['post', 'delete']);

        $product = $this->Products->get($id);

        if($this->Products->delete($product)){
            $this->Flash->success(__('The product with id: {0} has been deleted', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function deleteuom($id){

        $this->request->allowMethod(['post', 'delete']);

        $product = $this->Products->Uom->get($id);

        if($this->Products->Uom->delete($product)){
            $this->Flash->success(__('The UOM with id: {0} has been deleted', h($id)));
            return $this->redirect(['action' => 'view', $product->product_id]);
        }
    }
}
?>
