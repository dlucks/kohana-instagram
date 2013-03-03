<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Kohana_AbstractSet implements Iterator {

    protected $_items = array();

    protected $_index = 0;



    public function rewind ()
    {
        $this->_index = 0;
    }

    public function current ()
    {
        return $this->_items[$this->_index];
    }

    public function key ()
    {
        return $this->_index;
    }

    public function next ()
    {
        $this->_index++;
    }

    public function valid ()
    {
        return isset($this->_items[$this->_index]);
    }

}