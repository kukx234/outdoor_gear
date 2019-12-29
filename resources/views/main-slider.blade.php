<?php
use App\Http\Controllers\MainSliderController;
$header_images = MainSliderController::mainSlider();
?>

<section class="main-slider">
    @foreach ($header_images as $header_image)
        <div class="img-container">
            <img src="{{asset("images/upload/$header_image->image")}}" alt="">
            <div class="slider-text">
                <h1 data-animation-in="fadeInDown">{{ $header_image->title }}</h1>
                <p data-animation-in="fadeInDown" data-delay-in="1">{{ $header_image->description }}</p>
                <a data-animation-in="fadeInDownBig" data-delay-in="1.5"class="more-btn">SAZNAJ VIŠE</a>
            </div>
        </div>
    @endforeach
</section>

<script>
   $('.main-slider').slick({
        dots: false,
        infinite: true,
        arrows:false,
        fade:true,
        speed: 800,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 8000,
    }).slickAnimation();
</script>