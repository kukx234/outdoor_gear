<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Models\CategoryImages;
use App\Models\Colone;
use App\Models\CategoryColona;

class CategoryController extends Controller
{
    public function allCategories()
    {
        return view('Admin.categories.category_list')->with('categories', Category::all());
    }

    public function categoryDetails(Request $request)
    {
        $category = Category::with(['product','subCategory','categoryImages','colones'])->where('id', $request->id)->first();
        return view('Admin.categories.category_details')->with('category', $category)
                                                        ->with('sub_categories', $category->subCategory)
                                                        ->with('products', $category->product)
                                                        ->with('images', $category->categoryImages)
                                                        ->with('kolone', Colone::all())
                                                        ->with('active_colones', $category->colones);
    }

    public function save(CategoryRequest $request)
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
        return response()->json([
          'success' => 'Record deleted successfully!'
        ]);
    }

    public function editCategory(Request $request)
    {
        $category = Category::where('id', $request->id)->first();
        return view('Admin.categories.category_edit')->with('category', $category);
    }

    public function editCategorySave(CategoryRequest $request)
    {
        Category::where('id', $request->id)->update(['title' => $request->title]);

        return redirect()->route('category_list')->with("Success", "Kategorija uspiješno uređena");
    }
}
