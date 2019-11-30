<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryImages extends Model
{
    protected $fillable = ['categories_id', 'image', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
