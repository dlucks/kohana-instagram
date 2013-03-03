<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Kohana_Comment extends AbstractItem {




    /**
     * Returns the message text of this comment.
     *
     * @return null
     */
    public function get_message ()
    {
        return isset($this->_data->text) ? $this->_data->text : NULL;
    }
}