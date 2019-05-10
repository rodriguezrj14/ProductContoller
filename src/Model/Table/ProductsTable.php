<?php

namespace App\Model\Table;

use App\Model\Entity\Products;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table{

    public function initialize(array $config){
        
        parent::initialize($config);

        $this->table('products');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Uom',[
            'foreignKey' => 'product_id',
            'dependent' => true

        ]);
    }

    public function validationDefault(Validator $validator){
        $validator
            ->notEmpty('product_name');

            return $validator;
    }

    public function buildRules(RulesChecker $rules){
        return $rules;
    }
}
