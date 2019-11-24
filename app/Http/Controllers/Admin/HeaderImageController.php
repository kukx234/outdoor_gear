<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\SaveImage;
use App\Models\HeaderImage;
use App\Http\Requests\HeaderImageRequest;

class HeaderImageController extends Controller
{
    public function showForm()
    {
        $header_images = HeaderImage::orderByDesc('id')->get();
        return view('Admin.headerImage.show_form')->with("images", $header_images);
    }

    public function addImage(HeaderImageRequest $request)
    {
        $image = request()->file('image');
        $image_name = time().".".$image->getClientOriginalExtension();

        $saveimg = new SaveImage;
        $saveimg->saveImageToFolder($image);

        HeaderImage::insert([
            'image' => $image_name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $header_images = HeaderImage::orderByDesc('id')->get();

        return redirect()->back()->with("images",$header_images);
    }
}
