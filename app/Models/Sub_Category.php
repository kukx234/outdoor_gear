<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = ['title', 'categories_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'sub_categories_id');
    }

}
