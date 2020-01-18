<?php
    use App\Http\Controllers\ProductsController;
?>
@extends('layouts.app')

@section('content')
@include('header')

<section class="product-sect">
    @foreach ($products as $product)
        <?php   
            $image = ProductsController::getImage($product->id);
        ?>
    <div class="product-list">
        <div>
            <img src="{{ asset("images/upload/$image") }}" alt="">
        </div>
        <h3>{{ $product->title }}</h3>
        <p>{{ substr($product->description, 0, 150 )}}</p>
        <a href="{{ route('viewProduct', $product->id) }}">Više</a>
    </div>
    @endforeach
</section>

    
@endsection