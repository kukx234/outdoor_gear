<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sub_Category;
use App\Models\Product_actions;
use App\Models\User;

class ProductController extends Controller
{
    public function allProducts()
    {
        return view('Admin.products.products_list')->with('products', Product::all());
    }

    public function newProduct()
    {
        return view('Admin.products.new_product')->with('categories',Category::all());                            
    }

    public function ajaxCategoryCall(Request $request)
    {
        $category = Category::with('subCategory')->where('id', $request->id)->first();
        return response()->json(['category' => $category]);
    }

    public function save(Request $request)
    {
        Product::insert([
            'price' => $request->price,
            'description' => $request->description,
            'title' => $request->title,
            'sub_categories_id' => $request->sub_category_id,
            'categories_id' => $request->category_id,
            'product_actions_id' => $request->discount,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('products_list')->with("Success", 'Produkt uspješno dodan');
    }
}
