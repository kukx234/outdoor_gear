<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderImage;

class MainSliderController extends Controller
{
    public static function mainSlider()
    {
        $header_images = HeaderImage::all();
        return $header_images;
    }
}
