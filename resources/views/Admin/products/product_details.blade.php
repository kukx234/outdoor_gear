@extends('layouts.adminnav')

@section('content')
<div class="category-list-form">
    <h1>{{ $product->title }}</h1>
    
    <div class="image-list-cont">

        <div class="img-cont">
            @foreach ($images as $image)
                <img src="{{ asset("images/upload/$image->image")}}" alt="">
            @endforeach
        </div>
            

        <div class="pro-subcat">
            <div class="category-name" >
                <h2>Kategorija</h2>
                <span> {{ $category->title }}</span>
            </div>

                @if (!empty($sub_category))
            <div class="category-name">
                <h2>Podkategorija</h2>
                <span> {{ $sub_category->title }}</span>
            </div>
            @endif

            <div class="category-name">
                <h2>Cijena</h2>
                <span> {{ $product->price }}kn</span>
            </div>
            @if (!empty($product->description))
            <div class="category-name">
                <h2>Opis</h2>
                <span>{{ $product->description }}</span>
            </div>
            @endif
            <div class="category-name">
                <h2>Kreiran</h2>
                <span> {{ $product->created_at }}</span>
            </div>

            <div class="list-buttons detail-btns">
                <a class="makeup onhover" href="{{ route("product_edit") }}?id={{ $product->id }}">Uredi</a>
                <!--<button class="delete onhover" onclick="popupAlert('productDelete',{{ $product->id }})">Obriši</button>-->
                <button onclick="goBack()"><i class="fas fa-arrow-circle-left"></i></button>
            </div>

        </div>
    </div>
</div>

    <script>
        function goBack() {
          window.history.back();
        }
    </script>
@endsection