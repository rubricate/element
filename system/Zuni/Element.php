<?php

/*
 * @package     ZuniPHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        http://4app.github.io/zuniphp
 * @copyright   2014 - 2016 
 * 
 */


namespace Zuni;

use Zuni\InterfaceClass\Render;

class Element implements Render
{
    private $_name;
    private $_attr = NULL;
    private $_content = NULL;
    private $_result;
    private $_autoClose;
    private $_tagAutoClose = array( 
        'area', 'base', 'basefont', 'br', 'col', 'frame', 'hr',
        'img', 'input', 'link', 'meta', 'param'
    );


    public function __construct($name)
    {
        $this->_name    = $name;
        return $this;
    }



    private function _setAutoClose($autoClose)
    {
        $this->_autoClose = $autoClose;
        return $this;
    } 


    public function attr($key, $value = NULL)
    {

        if(is_string($key) && $value === NULL)
        {
            self::_getInstanceAttr()->append($key);
            return $this;
        }

        if(is_array($key) && ($value === NULL))
        {
            foreach($key as $k => $v) 
            {
                self::_getInstanceAttr()->offsetSet($k, $v);
            }
            return $this;
        }

        if(is_array($value))
        {
            $value = implode(' ', $value);
        }

        self::_getInstanceAttr()->offsetSet($key, $value);

        return $this;
    } 




    public function add($content)
    {
        self::_getInstanceContent()->append($content);
        return $this;
    } 



    private function _start()
    {

        $this->_result('<');
        $this->_result($this->_name);

        if(self::_getInstanceAttr()->count())
        {
            foreach (self::_getInstanceAttr() as $key => $value)
            {
                $attr = sprintf(' %s="%s"', $key, $value);

                if(is_numeric($key))
                {
                    $attr = sprintf(' %s', $value);
                }

                $this->_result($attr);
            }

        }

        if($this->_isAutoClose())
        {
            $this->_setAutoClose(' /');
            $this->_stripContent();
        }

        $this->_result($this->_autoClose);
        $this->_result('>');

        return $this;

    } 




    private function _stripContent()
    {
        if(self::_getInstanceContent()->count())
        {
            $this->_content = NULL;
        }
        return $this;
    } 




    public function render()
    {
        $this->_start();

        if(self::_getInstanceContent()->count())
        {
            foreach (self::_getInstanceContent() as $content)
            {
                if(self::_isContent($content))
                {
                    $this->_result($content);
                }
            }

            $this->_end();

        }

        return implode('', (array) $this->_result);
    } 






    private function _end()
    {
        $this->_result(sprintf('</%s>', $this->_name));
        return $this;
    } 






    private function _isContent($content)
    {
        $isStrOrNum = (is_string($content) || (is_numeric($content)));
        $isObject = (self::_isInstanceOfRender($content));

        return ($isStrOrNum || $isObject);
    } 




    private function _isAutoClose()
    {
        return (in_array($this->_name, $this->_tagAutoClose));
    } 




    private function _result($append)
    {

        if($this->_result == NULL)
        {
            $this->_result  = new \ArrayObject();
        }


        if(self::_isInstanceOfRender($append))
        {
            $append = $append->render();
        }

        $this->_result->append($append);

        return $this;
    } 






    private function _isInstanceOfRender($instance)
    {
        return ($instance instanceof Render);
    } 



    private function _getInstanceAttr()
    {

        if($this->_attr == NULL)
        {
            $this->_attr = new \ArrayObject();
        }

        return $this->_attr;
    } 




    private function _getInstanceContent()
    {

        if($this->_content == NULL)
        {
            $this->_content  = new \ArrayObject();
        }

        return $this->_content;
    } 



}    

