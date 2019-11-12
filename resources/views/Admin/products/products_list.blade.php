@extends('layouts.adminnav')

@section('content')
    <h1>Produkti</h1>

    <a href="{{ route('new_product') }}">Novi produkt</a>

    @if (!empty($products))
        <ul>
            @foreach ($products as $product)
                <li>
                    <span>{{ $product->title }}</span>
                    <div class="list-buttons">
                        <a href="{{ route('product_details', $product->id) }}">Detalji</a>
                        <a href="{{ route("product_edit", $product->id) }}">Uredi</a>
                        <a class="delete" onclick="popupAlert('productDelete',{{ $product->id }})">Obriši</a>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
    @include('Admin.popup_warning')
@endsection