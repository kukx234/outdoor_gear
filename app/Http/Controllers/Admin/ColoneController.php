<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class ColoneController extends Controller
{
    public function saveKolona(Request $request)
    {
        $category_id = $request->id;
        $kolone = $request->kolone;
        $colones = [];
        
        $category = Category::with('colones')->where('id', $category_id)->first();
        $category->colones()->detach();
        $category->colones()->attach($kolone);

        return redirect()->route('category_details',$category_id);
    }
}
