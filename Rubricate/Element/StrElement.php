<?php 

namespace Rubricate\Element;

class StrElement implements IGetElement
{
    private $str;
    private $arg = array();

    public function __construct($str)
    {
        $this->str = $str;
    }

    public function setParam($arg)
    {
        $this->arg[] = $arg;
    } 

    public function getElement()
    {
       return 
           (!count($this->arg))? $this->str
           : vsprintf($this->str, $this->arg);
    } 

}    

