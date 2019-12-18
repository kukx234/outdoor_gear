<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MainController extends Controller
{
    public static function colonaPosition($position)
    {
        $categories = Category::with('subCategory')->whereHas('colones', function($q) use($position){
            $q->where('colona',$position);
        })->get();
        
        return $categories;
    }
}
