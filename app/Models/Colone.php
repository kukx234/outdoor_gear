<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colone extends Model
{
    protected $table = 'colona';

    protected $fillable = ['colona'];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','category_colona','colona_id','category_id');
    }
}
