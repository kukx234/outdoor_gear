@extends('layouts.adminnav')

@section('content')
    <h1>{{ $product->title }}</h1>

    <div>
        <span>Kategorija : {{ $category->title }}</span>
        @if (!empty($sub_category))
            <span>Podkategorija: {{ $sub_category->title }}</span>
        @endif
        <span>Cijena: {{ $product->price }}kn</span>
        @if (!empty($product->description))
            <p>{{ $product->description }}</p>
        @endif
        <span>Kreiran : {{ $product->created_at }}</span>

        <a class="makeup onhover" href="{{ route("product_edit") }}?id={{ $product->id }}">Uredi</a>
        <button class="delete onhover" onclick="popupAlert('productDelete',{{ $product->id }})">Obriši</button>
        <button onclick="goBack()">Nazad</button>
    </div>

    <script>
        function goBack() {
          window.history.back();
        }
    </script>
@endsection