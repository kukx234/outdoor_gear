<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['title', 'created_at', 'updated_at'];

    public function subCategory()
    {
        return $this->hasMany('App\Models\Sub_Category', 'categories_id');
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'categories_id');
    }

}
