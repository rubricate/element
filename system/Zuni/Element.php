<?php

/*
 * @package     ZuniPHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        http://4app.github.io/zuniphp
 * @copyright   2014 - 2015 
 * 
*/


namespace Zuni;

use Zuni\InterfaceClass\Render;

class Element implements Render
{
    private $_name;
    private $_attr = array();
    private $_content;
    private $_append;
    private $_autoClose;
    private $_tagAutoClose = array( 
        'area', 'base', 'basefont', 'br', 'col', 'frame', 'hr',
        'img', 'input', 'link', 'meta', 'param'
    );


    public function __construct($name)
    {
        $this->_name = $name;
        return $this;
    }



    private function _setAutoClose($autoClose)
    {
        $this->_autoClose = $autoClose;
        return $this;
    } 


    public function attr($key, $value = NULL)
    {


        if($key)
        {
            if(is_array($key) && ($value === NULL))
            {
                foreach($key as $k => $v) 
                {
                    $this->_attr[$k] = $v;
                }
                return $this;
            }

            $this->_attr[$key] = $value;
        }

        return $this;
    } 




    public function add($content)
    {
        $this->_content[] = $content;
        return $this;
    } 



    private function _start()
    {

        $this->_append('<');
        $this->_append($this->_name);

        if(count($this->_attr))
        {
            foreach ($this->_attr as $key => $value)
            {
                $this->_append(sprintf(' %s="%s"', $key, $value));
            }

        }

        if($this->_isAutoClose())
        {
            $this->_setAutoClose(' /');
            $this->_stripContent();
        }

        $this->_append($this->_autoClose);
        $this->_append('>');

        return $this;

    } 




    private function _stripContent()
    {
        if(isset($this->_content))
        {
            $this->_content = NULL;
        }
        return $this;
    } 











    public function render()
    {
        $this->_start();

        if(is_array($this->_content))
        {
            foreach ($this->_content as $content)
            {
                $this->_toText($content);
                $this->_toObject($content);
            }

            $this->_end();

        }

        return implode('', $this->_append);
    } 






    private function _end()
    {
        $this->_append(sprintf('</%s>', $this->_name));
        return $this;
    } 







    private function _toText($content)
    {
        if(is_string($content) || (is_numeric($content)))
        {
            $this->_append($content);
        }

        return $this;
    } 







    private function _toObject($content)
    {
        if(self::_isInstanceOfRender($content))
        {
            $this->_append($content);
        }

        return $this;

    } 





    private function _isAutoClose()
    {
        return (in_array($this->_name, $this->_tagAutoClose));
    } 




    private function _append($append)
    {

        if(self::_isInstanceOfRender($append))
        {
            $append = $append->render();
        }

        $this->_append[] = $append;

        return $this;
    } 






    private function _isInstanceOfRender($instance)
    {
        return ($instance instanceof Render);
    } 





}    

