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
        $partial_url = explode("?", $full_url);
        $pass_url[0] = "header";
        $pass_url[1] = null;
        
        if (count($partial_url) >= 2){
            $pass_url = explode("=", $partial_url[1]);
        }

        $parameters = [
            'model' => $pass_url[0],
            'id' => $pass_url[1],
            'title' => $request->title,
            'description' => $request->description,
        ];
        
        $result = SaveImage::saveImageToDatabase($image,$parameters);
        return redirect()->back()->with("images",$result)->with("Success", "Slika uspiješno dodana");
    }


    public function deleteImage(Request $request)
    {
        $parameters = $request->all();
        SaveImage::deleteImageFromDatabase($parameters);
        return "success";
    }


}
