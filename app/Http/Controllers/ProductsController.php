<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function viewProduct($id)
    {
        $product = Product::with('productImages')->where('id', $id)->first();
        return view('view_product')->with('product', $product);
    }

    public function productsList($catId)
    {
        $result = Category::with('product')->where('id', $catId)->first();
        $products = $result->product;
        return view('products_list')->with('products',$products);
    }

    public static function getImage($id)
    {
        $product = Product::with('productImages')->where('id', $id)->first();
        $image = $product->productImages[0]->image;
        return $image;
    }
}
