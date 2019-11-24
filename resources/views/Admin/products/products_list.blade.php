@extends('layouts.adminnav')

@section('content')

<div class="category-list">

  <div class="category-list-form">

@include('Admin.success_msg')

    <h1>Produkti</h1>

    <div><a class="new-category-btn" href="{{ route('new_product') }}">Novi produkt</a></div>

    @if (!empty($products))
        <ul>
            @foreach ($products as $product)
                <li>
                    <span>{{ $product->title }}</span>
                    <div class="list-buttons">
                        <a class="details onhover" href="{{ route('product_details', $product->id) }}">Detalji</a>
                        <a href="{{ route('add-image')}}?product_id={{ $product->id }}">Dodaj sliku</a>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
  </div>
</div>
    @include('Admin.popup_warning')
@endsection

