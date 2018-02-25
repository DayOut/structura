<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static $key = 'post_id';
    //
    public function getDescription()
    {
        $description = substr($this->post_content, 0, 250);
        $description .= "...";
        return $description;
    }
}
