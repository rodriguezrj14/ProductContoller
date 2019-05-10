<?php

namespace App\Model\Table;

use App\Model\Entity\Uom;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UomTable extends Table{

	public function initialize(array $config){
        
        parent::initialize($config);


        $this->table('uom');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
        	'foreignKey' => 'id',
        	'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator){

    	$validator
            ->notEmpty('uom_name');

        $validator
            ->notEmpty('price');

    	return $validator;
    }

    public function buildRules(RulesChecker $rules){
        return $rules;
    }

}
