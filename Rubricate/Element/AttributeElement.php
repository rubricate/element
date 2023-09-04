<?php 

namespace Rubricate\Element;

use Rubricate\Element\IAttribute;

class AttributeElement implements IAttributeElement
{
    private $attr;

    public function __construct($key, $value = null)
    {
        self::_set($key, $value);
    }

    public function getAttribute()
    {
        return  $this->attr;
    } 

    private function _set($key, $value)
    {
        $this->attr = self::_getAttributeKeyValue($key, $value); 
    } 

    private function _getAttributeKeyValue($key, $value)
    {
        $isNull    = (is_null($value));
        $keyValue  = sprintf('%s="%s"', $key, $value);

        return ($isNull)? $key: $keyValue;
    } 

}    

