<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $primaryKey = 'photo_id';
    // Get parent album
    public function album()
    {
        return $this->belongsTo('App\Album');
    }

    public function getPath()
    {
        return $this->path;
    }
}
