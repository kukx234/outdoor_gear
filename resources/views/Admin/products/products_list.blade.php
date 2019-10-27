@extends('layouts.adminnav')

@section('content')
    <h1>Produkti</h1>

    <a href="{{ route('new_product') }}">Novi produkt</a>

    @if (!empty($products))
        <ul>
            @foreach ($products as $product)
                <li>
                    <span>{{ $product->title }}</span>
                    <span>{{ $product->categories_id }}</span>
                    <span>{{ $product->sub_categories_id }}</span>
                    <a href="">Detalji</a>
                </li>
            @endforeach
        </ul>
    @endif

@endsection