<?php

/*
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/element 
 * @copyright   2014 - 2018 
 */

namespace Rubricate\Element;

use Rubricate\Element\Config\TagAutoCloseConfigElement;

class CreateElement implements IElement
{
    private $tagname;
    private $arr;
    private $close;
    


    public function __construct($tagname)
    {
        $this->tagname = $tagname;
        $this->arr     = new ArrElement();

        return $this;
    }



    public function addChild(IGetElement $e)
    {
        $i = $this->arr->get('inner');
        $i->append($e->getElement());

        return $this;
    } 



    public function setAttribute($name, $value = null)
    {
        $attr = new AttributeElement($name, $value);

        $a = $this->arr->get('attr');
        $a->append($attr->getAttribute());

        return $this;
    } 



    public function getElement()
    {
        self::start();
        self::inner();
        $e = (array) $this->arr->get('element');

        return implode('', $e);
    } 



    private function start()
    {

        $e = $this->arr->get('element');

        $e->append('<');
        $e->append($this->tagname);

        self::setAttrs();

        if(in_array(
            $this->tagname,
            TagAutoCloseConfigElement::getAll()
        ) 
        ) {
            $this->inner = null;
            $this->close = ' /';
        }

        $e->append($this->close);
        $e->append('>');

        return $this;

    } 



    private function inner()
    {
        $i = $this->arr->get('inner');

        if($i->count()) {

            $e = $this->arr->get('element');

            foreach ($i as $inner) {
                $e->append($inner);
            }

            $e->append('</' . $this->tagname . '>');
        }

        return $this;
    } 



    private function setAttrs()
    {
        $a = $this->arr->get('attr');

        if($a->count()) {

            $e = $this->arr->get('element');

            foreach ($a as $v) {
                $attr = sprintf(' %s', $v);

                $e->append($attr);
            }

        }
        return $this;
    } 



}    

