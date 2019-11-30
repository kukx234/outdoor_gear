<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['price', 'description', 'title', 'sub_categories_id', 
                            'categories_id', 'products_actions_id', 'created_at', 'updated_at'];

    
    public function subCategory()
    {
        return $this->belongsTo('App\Models\Sub_Category');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function product_action(Type $var = null)
    {
        return $this->belongsTo('App\Models\Product_action');
    }

    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImages');
    }
}
