<?php 
    use App\Http\Controllers\MainController; 
    $categories = MainController::colonaPosition(5);
?> 

<section class="deliver-info">
        @foreach ($categories as $category)
            
                @foreach ($category->product as $product)
                    <div class="desc-box">
                       <h2> {{ $product->title }} </h2>
                        {{ $product->description }}
                    </div>
                @endforeach
            
        @endforeach
</section>

<script>
    var margin = 0;
    $(".desc-box").each(function(index) {
        $(this).css({
            "margin-top" : margin,
        });
        margin = margin + 45;
    });
</script>