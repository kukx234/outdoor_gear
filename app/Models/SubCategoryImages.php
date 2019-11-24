<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategoryImages extends Model
{
    protected $fillable = ['sub_categories_id', 'image', 'created_at', 'updated_at'];

    public function subCategory()
    {
        return $this->belongsTo('App\Models\Sub_Category');
    }
}
