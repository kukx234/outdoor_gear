<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sub_Category;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /*public function subCategoryForm()
    {

        $sub_categories = Sub_Category::where('categories_id', $_GET['id'])->orderBy('created_at', 'desc')->get();
        $category = Category::where('id', $_GET['id'])->first();

        return view('Admin.new_sub_category')->with('sub_categories', $sub_categories)
                                             ->with('category', $category);
    }*/

    public function save(Request $request)
    {
        Sub_Category::insert([
            'title' => $request->title,
            'categories_id' => $request->categoryId,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('sub_category_list')->with('Success', 'Podkategorija uspješno dodana');
    }

    public function allSubCategories()
    {
        return view('Admin.sub_categories.sub_category_list')->with('sub_categories', Sub_Category::all());
    }

    public function newSubCategory()
    {
        return view('Admin.sub_categories.new_sub_category')->with('categories',Category::all());
    }

    public function delete(Request $request)
    {
        Sub_Category::where('id', $request->id)->delete();
        return redirect()->route('sub_category_list')->with('Success', 'Podkategorija uspješno obrisana');
    }

}
