<?php
use App\Http\Controllers\MainController; 
$products = MainController::allProducts();
?>

<section class="spec-offer">
  
    <h1>POSEBNE PONUDE</h1>

    <div class="sale-section">
        @foreach ($products as $product)
            <div class="products-box">
                <div class="img-sale-box">
                    @if (count($product->productImages) > 0)
                      <?php $image = $product->productImages[0]->image; ?>
                      <img src="{{ asset("images/upload/$image") }}" alt="">
                    @endif
                    <div class="price-overlay">99,99 kn</div>
                </div>

                <h3>{{ $product->title }}</h3>
                <p>{{ substr($product->description, 0, 150) }}</p>
                <a href="{{ route('viewProduct', $product->id) }}">Više</a>
            </div>
        @endforeach 
    </div>
    <div class="gradient"></div>
</section>

<script>
$('.sale-section').slick({
  dots: true,
  customPaging : function(slider, i) {
        return '<i class="far fa-circle"></i>';
    },
  infinite: true,
  arrows: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
				

</script>