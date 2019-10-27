<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_action extends Model
{
    protected $fillable = ['discount'];

    public function product(Type $var = null)
    {
        return $this->hasMany('App\Models\Product');
    }
}
