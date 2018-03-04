<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $primaryKey = 'album_id';
    // Get photo
    public function photos()
    {
        return $this->hasMany('App\Photo', 'album_id', 'album_id');
    }
}
