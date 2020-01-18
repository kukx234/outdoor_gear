<?php
use App\Http\Controllers\MainSliderController;
$header_images = MainSliderController::mainSlider();
?>

<section class="main-slider">
    @foreach ($header_images as $header_image)
        <div class="img-container">
            <img src="{{asset("images/upload/$header_image->image")}}" alt="">
            <div class="slider-text">
                <h1 data-animation-in="rotateInUpLeft">{{ $header_image->title }}</h1>
                <p data-animation-in="rotateInUpLeft" data-delay-in="1">{{ $header_image->description }}</p>
                <a data-animation-in="rotateInUpLeft" data-delay-in="1.5" class="more-btn">SAZNAJ VIŠE</a>
            </div>
            <img class="png-overlay"src="{{ asset("images/testna.png") }}" alt="">
        </div>
    @endforeach
</section>

<script>
$('.main-slider').slick({
    arrows:false,
    dots:true,
    fade:true,
    infinite:true,
    customPaging : function(slider, i) {
        return '<i class="far fa-circle"></i>';
    },
  
}).slickAnimation();

</script>