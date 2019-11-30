@extends('layouts.adminnav')

@section('content')
<div class="category-list-form">
    <h1>{{ $category->title }}</h1>

    @if (!$sub_categories->isEmpty())
        <div class="sub-categories list-title">
            <div> 
                <h3>Podkategorije</h3> 
                <div class="span-count">
                    <span>{{ count($sub_categories) }}</span>
                </div>
            </div>
            <ul>
                @foreach ($sub_categories as $sub_category)
                    <li>
                        {{ $sub_category->title }}
                        <a href="{{ route('sub_category_details', $sub_category->id) }}">Detalji</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (!$products->isEmpty())
        <div class="products list-title">
            <div>
                <h3>Produkti</h3>
                <div class="span-count">
                    <span>{{ count($products) }} </span>
                </div>
            </div>
            <ul>
                @foreach ($products as $product)
                    <li>
                        {{ $product->title }}
                        <a href="{{ route('product_details', $product->id) }}">Detalji</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="list-buttons detail-btns">
        <a class="makeup onhover" href="{{ route('category_edit', $category->id) }}">Uredi</a>
        <!--<button class="delete onhover" onclick="popupAlert('categoriesdelete',{{ $category->id }})">Obriši</button>-->
        <button onclick="goBack()"><i class="fas fa-arrow-circle-left"></i></button>
    </div>
</div>

@endsection