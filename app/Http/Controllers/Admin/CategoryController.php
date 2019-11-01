<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function allCategories()
    {
        return view('Admin.categories.category_list')->with('categories', Category::all());
    }

    public function categoryDetails(Request $request)
    {
        $category = Category::where('id', $request->id)->first();
        
        return view('Admin.categories.category_details')->with('category', $category);
    }

    public function save(Request $request)
    {
        Category::insert([
            'title' => $request->title,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        return redirect()->route("category_list")->with("Success", "Kategorija uspješno dodana");
    }

    public function categoryList()
    {
        return Category::orderBy('created_at','desc')->get();
    }

    public function newCategory()
    {
        return view('Admin.categories.new_category');
    }

    public function deleteCategory(Request $request)
    {
        Category::where('id', $request->id)->delete();
        return redirect()->route('category_list')->with('Success', 'Kategorija uspješno pobrisana');
    }
}