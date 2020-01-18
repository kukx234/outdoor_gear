<?php 
    use App\Http\Controllers\MainController; 
    $categories = MainController::colonaPosition(2);
?>

<section class="izdvojeno">
    
    @foreach ($categories as $category)
        <div data-aos="fade-right" data-aos-duration="1500" >
            <h1 >{{ $category->product[0]->title }}</h1>
            <p>{{ $category->product[0]->description }}</p>
        </div>
        <?php
            $image = MainController::getImage("Product", $category->product[0]->id);
        ?>
        <div class="izd-img-cont">
            <img data-aos="fade-left" data-aos-duration="1500" data-aos-delay="1000" src="{{ asset("images/upload/$image") }}" alt="">
        </div>
    @endforeach
</section>

<script>
    AOS.init({
        once:true,
    });
</script>
