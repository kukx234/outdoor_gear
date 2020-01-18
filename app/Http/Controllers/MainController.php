<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    public static function colonaPosition($position)
    {
        $categories = Category::with('subCategory','product','categoryImages')->whereHas('colones', function($q) use($position){
            $q->where('colona',$position);
        })->get();

        return $categories;
    }

    public static function getImage($model, $id)
    {
        $arrg = app("App\Models\\$model");
        $product = $arrg::with('productImages')->where('id', $id)->first();
        return $product->productImages[0]->image;
    }

    public static function allProducts()
    {
        $products = Product::with('productImages')->get();

        return $products;
    }
}
