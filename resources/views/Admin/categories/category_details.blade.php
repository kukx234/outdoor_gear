@extends('layouts.adminnav')

@section('content')
    <h1>{{ $category->title }}</h1>

    @if (!$sub_categories->isEmpty())
        <div class="sub-categories">
            <span>Podkategorije ({{ count($sub_categories) }}) </span>
            <ul>
                @foreach ($sub_categories as $sub_category)
                    <li>
                        {{ $sub_category->title }}
                        <a href="">Detalji</a>
                        <a href="">Uredi</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (!$products->isEmpty())
    <span>Produkti ({{ count($products) }}) </span>
        <div class="products">
            <ul>
                @foreach ($products as $product)
                    <li>
                        {{ $product->title }}
                        <a href="">Detalji</a>
                        <a href="">Uredi</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
   

@endsection