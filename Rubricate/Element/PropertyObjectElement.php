<?php

/*
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/element 
 * @copyright   2017 
 */

namespace Rubricate\Element; 

use ArrayObject;

class PropertyObjectElement implements IPropertyObjectElement
{

    private $attr    = NULL;
    private $inner   = NULL;
    private $element = NULL;

    public function __construct() { }

    public function getSingleton($classProperty)
    {
        if(!$this->$classProperty)
        {
            $this->$classProperty = new ArrayObject();
        }

        return $this->$classProperty;
    } 


}    


