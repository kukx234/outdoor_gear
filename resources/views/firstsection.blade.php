<?php 
    use App\Http\Controllers\MainController; 
    $categories = MainController::colonaPosition(2);
?>

@foreach ($categories as $category)
    <h1>{{ $category->product[0]->title }}</h1>
    <p>{{ $category->product[0]->description }}</p>
    <?php
    $image = $category->categoryImages[0]->image;
    ?>
    <img src="{{ asset("images/upload/$image") }}" alt="">
@endforeach