<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\SaveImage;
use App\Models\HeaderImage;
use App\Http\Requests\HeaderImageRequest;

class HeaderImageController extends Controller
{
    public function showForm(Request $request)
    {
        if($request->categories_id){
            $category_images = SaveImage::showFormImages('category', $request->categories_id);
            return view('Admin.headerImage.show_form')->with("images", $category_images);
        }
        elseif ($request->subcategory_id) {
            $sub_category_images = SaveImage::showFormImages('sub_category', $request->subcategory_id);
            return view('Admin.headerImage.show_form')->with("images", $sub_category_images);
        }
        elseif ($request->product_id) {
            $product_images = SaveImage::showFormImages('product', $request->product_id);
            return view('Admin.headerImage.show_form')->with("images", $product_images );
        }
        else {
            $header_images = HeaderImage::orderByDesc('id')->get();
            return view('Admin.headerImage.show_form')->with("images", $header_images);
        }

    }

    public function addImage(HeaderImageRequest $request)
    {
        $image = request()->file('image');
        SaveImage::saveImageToFolder($image);

        if($request->category_id){
            $result = SaveImage::saveImageToDatabase($image, 'category', $request->category_id);
        }
        elseif($request->subcategory_id){
            $result = SaveImage::saveImageToDatabase($image, 'sub_category', $request->subcategory_id);
        }
        elseif($request->product_id){
            $result = SaveImage::saveImageToDatabase($image, 'product', $request->product_id);
        }
        else {
            $result = SaveImage::saveImageToDatabase($image, 'header', $request->id);
        }
        return redirect()->back()->with("images",$result);
    }

    public function deleteImage(Request $request)
    {

        if($request->model == "cat"){
            SaveImage::deleteImageFromDatabase('category', $request->image_id);
        }
        else if($request->model == "subcat"){
            SaveImage::deleteImageFromDatabase('subcategory', $request->image_id);
        }
        elseif($request->model == "product"){
            SaveImage::deleteImageFromDatabase('product', $request->image_id);
        }
        else{
            HeaderImage::where('id', $request->image_id)->delete();
        }
    }
}
