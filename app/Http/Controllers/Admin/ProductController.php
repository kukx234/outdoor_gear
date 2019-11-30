<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
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

    public static function validateCall(Request $request)
    {
        $category = Category::with('subCategory')->where('id', $request->category_id)->first();
        return $category;
    }

    public function save(ProductRequest $request)
    {
        $category_id = $request->category_id;
        if($request->sub_category_id) {
           $category_id = null;
        }

        Product::insert([
            'price' => $request->price,
            'description' => $request->description,
            'title' => $request->title,
            'sub_categories_id' => $request->sub_category_id,
            'categories_id' => $category_id,
            'product_actions_id' => $request->discount,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('products_list')->with("Success", 'Produkt uspješno dodan');
    }

    public function delete(Request $request)
    {
        Product::where('id', $request->id)->delete();
    }

    public function details(Request $request)
    {
        $product = Product::with('productImages')->where('id', $request->id)->first();
        $sub_category = Sub_Category::where('id', $product->sub_categories_id)->first();

        if($sub_category != null){
            $category = Category::where('id', $sub_category->categories_id)->first();
        }else {
            $category = Category::where('id', $product->categories_id)->first();
        }
       

        return view('Admin.products.product_details')->with('product', $product)
                                                     ->with('category', $category)
                                                     ->with('sub_category', $sub_category)
                                                     ->with('images', $product->productImages);
    }

    public function editProduct(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $sub_category = "";
        $subcategories = "";
        $categories = Category::all();

        if($product->sub_categories_id != null) {
            $sub_category = Sub_Category::where('id', $product->sub_categories_id)->first();
            $subcategories = Sub_Category::where('categories_id', $sub_category->categories_id)->get();
        }

        return view('Admin.products.product_edit')->with("product", $product)
                                                    ->with("categories", $categories)
                                                    ->with("subcategory", $sub_category)
                                                    ->with("subcategories", $subcategories);
    }

    public function editSave(ProductRequest $request)
    {
        $sub_category_id = $request->sub_category_id;
        if(!$request->sub_category_id){
            $sub_category_id = null;
        }

        Product::where('id', $request->id)->update([
            'title' => $request->title,
            'categories_id' => $request->category_id,
            'sub_categories_id' => $sub_category_id,
            'description' => $request->description,
            'price' => $request->price,
            'product_actions_id' => $request->discount,
            'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return redirect()->route('products_list')->with("Success", "Produkt uspiješno uređen");
    }

    public static function ajaxCategoryCall(Request $request)
    {
        $category = Category::with('subCategory')->where('id', $request->category_id)->first();
        return with(["category" => $category ]);
    }

}
