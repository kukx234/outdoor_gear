@extends('layouts.adminnav')


@section('content')

<div class="category-list-form">

    <h1>{{ $sub_category->title }}</h1>

    <div class="image-list-cont">

        <div class="img-cont">
            @foreach ($images as $image)
                <img src="{{ asset("images/upload/$image->image")}}" alt="">
            @endforeach
        </div>
    
        <div class="pro-subcat">
            <div class="category-name">
                <h2>Kategorija</h2>
                <span> {{ $category->title }}</span>
            </div>    

            @if (!$products->isEmpty())
                <div class="products list-title">
                    <div>
                        <h3>Produkti</h3>
                        <div class="span-count">
                            <span class="prodc"> {{ count($products) }}</span>
                        </div>
                    </div>
                    <ul>
                        @foreach ($products as $product)
                            <li>
                                {{ $product->title }}
                                <div>
                                    <a class="details onhover" href="{{ route('product_details', $product->id) }}">Detalji</a>
                                <a data-route="{{ asset('/admin/productDelete')}}" data-id="{{ $product->id }}" class="delete">
                                        <i class="fas fa-trash"></i>
                                    </a>    
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div> 
            @endif

            <div class="list-buttons detail-btns">
                <a class="makeup onhover" href="{{ route('sub_category_edit', $sub_category->id) }}">Uredi</a>
                <!---<a class="delete onhover" onclick="popupAlert('deletesubcategory',{{ $sub_category->id }})">Obriši</a>-->
                <button onclick="goBack()"><i class="fas fa-arrow-circle-left"></i></button>
            </div>
        </div>
    </div>
</div>
    @endsection