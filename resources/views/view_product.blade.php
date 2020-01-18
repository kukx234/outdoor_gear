@extends('layouts.app')

@section('content')
    @include('header')
<section class="view-prod">
    @foreach ($product->productImages as $image)
        <div class="prod-img-box">
            <img src="{{ asset("images/upload/$image->image") }}" alt="">
        </div>
        @endforeach
        <div class="prod-review">
            <h1>{{ $product->title }}</h1>
            <p>{{ $product->description }}</p>
        </div>
</section>
@endsection