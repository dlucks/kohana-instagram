<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Kohana_AbstractItem {

    /**
     * @var Contains all data received from api for this item.
     */
    protected $_data;




    /**
     * Constructor
     *
     * @param $data
     */
    public function __construct ($data)
    {
        $this->_data = $data;
    }




    /**
     * Returns the id of this item.
     *
     * @return null
     */
    public function get_id ()
    {
        return isset($this->_data->id) ? $this->_data->id : NULL;
    }




    /**
     * Returns the timestamp of creation time of this item.
     *
     * @return null
     */
    public function get_creation_time ()
    {
        return isset($this->_data->created_time) ? $this->_data->created_time : NULL;
    }

}