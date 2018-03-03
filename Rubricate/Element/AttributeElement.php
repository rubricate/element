<?php 

/*
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/element 
 * @copyright   2016 - 2017
 */

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

