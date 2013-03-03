<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Kohana_MediaSet extends AbstractSet {

    private $_meta;

    private $_pagination;


    /**
     * Constructor.
     *
     * @param $data
     */
    public function __construct ($data)
    {
        $this->_meta = isset($data->meta) ? $data->meta : NULL;
        $this->_pagination = isset($data->pagination) ? $data->pagination : NULL;

        if (isset($data->data))
        {
            foreach ($data->data as $media_item)
            {
                $this->_items[] = new MediaItem($media_item);
            }
        }
    }
}