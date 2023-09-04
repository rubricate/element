<?php

namespace Rubricate\Element; 

use ArrayObject;

class ArrElement implements IArrElement
{
    private $attr    = null;
    private $inner   = null;
    private $element = null;

    public function __construct() {}

    public function get($key)
    {
        if(!$this->$key) {
            $this->$key = new ArrayObject();
        }

        return $this->$key;
    } 

}    

