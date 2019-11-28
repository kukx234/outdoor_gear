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
        $full_url = $request->fullUrl();
        $parameters = explode("?", $full_url);
        $images = SaveImage::showFormImages($parameters);
        return view('Admin.headerImage.show_form')->with("images", $images);
    }


    public function addImage(HeaderImageRequest $request)
    {
        $image = request()->file('image');
        SaveImage::saveImageToFolder($image);
        $full_url = $request->fullUrl();
        $parameters = explode("?", $full_url);
        $result = SaveImage::saveImageToDatabase($image,$parameters);
        return redirect()->back()->with("images",$result);
    }


    public function deleteImage(Request $request)
    {
        $parameters = $request->all();
        SaveImage::deleteImageFromDatabase($parameters);
        return "success";
    }


}
