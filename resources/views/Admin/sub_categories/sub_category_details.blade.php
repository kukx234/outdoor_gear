@extends('layouts.adminnav')


@section('content')

<h1>{{ $sub_category->title }}</h1>

    <div>
        <span> Kategorija: {{ $category->title }}</span>
    </div>

    @if (!$products->isEmpty())
        <div class="products">
            <span>Produkti ({{ count($products) }})</span>
            <ul>
                @foreach ($products as $product)
                    <li>
                        {{ $product->title }}
                        <a href="{{ route('product_details', $product->id) }}">Detalji</a>
                        <a href="">Uredi</a>
                    </li>
                @endforeach
            </ul>
        </div> 
    @endif

    <button onclick="goBack()">Nazad</button>
  
    <script>
        function goBack() {
          window.history.back();
        }
    </script>
@endsection