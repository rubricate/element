<?php

/*
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/element 
 * @copyright   2017 - 2018
 */

namespace Rubricate\Element; 

use ArrayObject;

class ArrElement implements IArrElement
{

    private $attr    = null;
    private $inner   = null;
    private $element = null;

    public function __construct() 
    { 
    }

    public function get($key)
    {
        if(!$this->$key) {
            $this->$key = new ArrayObject();
        }

        return $this->$key;
    } 



}    

