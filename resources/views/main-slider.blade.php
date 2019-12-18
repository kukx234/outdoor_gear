<?php
use App\Http\Controllers\MainSliderController;
$header_images = MainSliderController::mainSlider();
?>

@foreach ($header_images as $header_image)
    <img src="{{asset("images/upload/$header_image->image")}}" alt="">
@endforeach