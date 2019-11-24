@extends('layouts.adminnav')

@section('content')
<div>
    <h1>{{ $category->title }}</h1>

    @if (!$sub_categories->isEmpty())
        <div class="sub-categories">
            <div> 
                Podkategorije
                <span>{{ count($sub_categories) }}</span>
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
    <span>Produkti ({{ count($products) }}) </span>
        <div class="products">
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

    <a class="makeup onhover" href="{{ route('category_edit', $category->id) }}">Uredi</a>
    <button class="delete onhover" onclick="popupAlert('categoriesdelete',{{ $category->id }})">Obriši</button>
    <button onclick="goBack()">Nazad</button>
</div>

<script>
    function goBack() {
      window.history.back();
    }

</script>
@endsection