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
        if($request->category_id){
            $category_images = SaveImage::showFormImages('category', $request->category_id);
            return view('Admin.headerImage.show_form')->with("images", $category_images);
        }
        elseif ($request->sub_category_id) {
            $sub_category_images = SaveImage::showFormImages('sub_category', $request->sub_category_id);
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
        elseif($request->sub_category_id){
            $result = SaveImage::saveImageToDatabase($image, 'sub_category', $request->sub_category_id);
        }
        elseif($request->product_id){
            $result = SaveImage::saveImageToDatabase($image, 'product', $request->product_id);
        }
        else {
            $result = SaveImage::saveImageToDatabase($image, 'header', $request->id);
        }
        return redirect()->back()->with("images",$result);
    }
}
