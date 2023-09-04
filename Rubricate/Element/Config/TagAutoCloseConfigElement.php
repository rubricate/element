<?php 

namespace Rubricate\Element\Config; 

class TagAutoCloseConfigElement
{
    private static $tag =  array( 

        'area', 'base',  'basefont', 
        'br',   'col',   'frame', 'hr', 
        'img',  'input', 'link', 
        'meta', 'param'
    );

    public static function getAll()
    {
        return self::$tag;
    } 
    
}    

