<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Uom extends Entity{

    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
