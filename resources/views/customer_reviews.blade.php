<?php 
    use App\Http\Controllers\MainController; 
    $categories = MainController::colonaPosition(4);
?>

<h1 class="custm-title">ŠTO NAŠI KUPCI MISLE O NAMA</h1>
<section class="sect-custm">
    
    @foreach ($categories as $category)
        @foreach ($category->product as $product)
            <?php 
                $image = MainController::getImage("Product", $product->id);
            ?>
            <div class="custm-box">
                <div>
                    <img src="{{ asset("images/upload/$image") }}" alt="">
                </div>
                <h3>{{ $product->title }}</h3>
                <p>{{ $product->description }}</p>
            </div>
        @endforeach
    @endforeach
</section>