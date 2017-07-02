<?php 

/*
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/element 
 * @copyright   2017 
 */

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


