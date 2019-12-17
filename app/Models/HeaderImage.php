<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderImage extends Model
{
    protected $fillable = ['image','created_at', 'updated_at','title','description'];
}
