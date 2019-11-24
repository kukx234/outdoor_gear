<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $fillable = ['product_id', 'image', 'created_at', 'updated_at'];
}
