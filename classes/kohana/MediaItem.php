<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Kohana_MediaItem extends AbstractItem {




    /**
     * @var array|Comment Stores all comments of this media item.
     */
    private $_comments = array();




    /**
     * Constructor
     *
     * @param $data     All data of this item received from api.
     */
    public function __construct ($data)
    {
        if ($data->comments->count > 0)
        {
            foreach ($data->comments->data as $comment_data)
            {
                $this->_comments[] = new Comment($comment_data);
            }
        }

        parent::__construct($data);
    }




    /**
     * Returns an object containing all data of thumbnail image.
     *
     * @return mixed
     */
    public function get_thumbnail ()
    {
        return $this->_data->images->thumbnail;
    }




    /**
     * Returns an object containing all data of low resolution image.
     *
     * @return mixed
     */
    public function get_low_resolution ()
    {
        return $this->_data->images->low_resolution;
    }




    /**
     * Returns an object containing all data of standard resolution image.
     *
     * @return mixed
     */
    public function get_standard_resolution ()
    {
        return $this->_data->images->standard_resolution;
    }




    /**
     * Returns the caption object of this item.
     *
     * @return mixed
     */
    public function get_caption ()
    {
        return (isset($this->_data->caption) ? $this->_data->caption : NULL);
    }




    /**
     * Returns the title of this item. The title is the text of the caption
     * of this image.
     *
     * @return string
     */
    public function get_title ()
    {
        return (isset($this->_data->caption) ? $this->_data->caption->text : '');
    }




    /**
     * Returns TRUE if this media item has any comments, else FALSE.
     *
     * @return bool
     */
    public function has_comments ()
    {
        return (count($this->_comments) > 0);
    }




    /**
     * Returns an array containing all comment objects of this media item.
     *
     * @return array|Comment
     */
    public function get_comments ()
    {
        return $this->_comments;
    }


}