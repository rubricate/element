<?php

declare(strict_types=1);

namespace Rubricate\Element; 

use ArrayObject;
use Exception;

class ArrElement implements IArrElement
{
    private $attr, $inner, $element;
    private $validKey = ['attr', 'inner', 'element'];

    public function __construct() {}

    public function get($key): object
    {
        if(!in_array($key, $this->validKey)){

            throw new Exception("'Only Allowed Key: attr, inner AND element'");
        }

        return (!$this->$key)? new ArrayObject: $this->$key;
    } 

}    

