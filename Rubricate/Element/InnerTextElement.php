<?php 

/*
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/element 
 * @copyright   2016 - 2017
 */

namespace Rubricate\Element;

use Rubricate\Element\InnerElement;


class InnerTextElement implements IInnerElement
{
    private $inner;
    


    public function __construct($inner)
    {
        $this->inner = $inner;
    }



    public function getInner()
    {
        return  $this->inner;
    } 



}    

