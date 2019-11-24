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
                        <a href="{{ route('product_details', $product->id) }}">Detalji</a>q
                    </li>
                @endforeach
            </ul>
        </div> 
    @endif

    <a class="makeup onhover" href="{{ route('sub_category_edit', $sub_category->id) }}">Uredi</a>
    <a class="delete onhover" onclick="popupAlert('deletesubcategory',{{ $sub_category->id }})">Obriši</a>
    <a onclick="goBack()"><i class="fas fa-arrow-circle-left"></i></a>
  
    <script>
        function goBack() {
          window.history.back();
        }
    </script>
    @include('Admin.popup_warning')
@endsection