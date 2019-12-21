@extends('layouts.adminnav')

@section('content')
<div class="category-list-form">
    <h1>{{ $category->title }}</h1>

    <div class="image-list-cont">
        @if (!$images->isEmpty())
            <div class="img-cont">
                @foreach ($images as $image)
                    <img src="{{ asset("images/upload/$image->image")}}" alt="">
                @endforeach
            </div>
        @endif

        <div class="pro-subcat">
            <div class="kolone">
                <p>Kolone:</p>
                <a class="new-kolona">
                    <i class="fas fa-plus"></i>
                    <!--<span>Nova kategorija</span>-->
                </a>
               @if (!empty($active_colones))
                   @foreach ($active_colones as $colona)
                       <p class="kolona-{{ $colona->colona }}">{{ $colona->colona }}</p>
                   @endforeach
               @endif
            </div>
            <div class="add-kolona-div">
                <div class="add-kolona">
                    <h3>Naslov</h3>
                    <form action="{{ route('save-kolona', $category->id) }}" method="POST">
                        @csrf
                        <select name="kolone[]" id="" class="kolona-select" multiple>
                            <option value="0">Odaberi kolonu...</option>
                            @foreach ($kolone as $kolona)
                                <option value="{{ $kolona->id }}">Kolona {{ $kolona->colona }}</option>
                            @endforeach
                        </select>
                        <div class="buttons kol">
                            <button class="btn-save" type="submit">Spremi</button>
                            <button class="btn-quit">Odustani</button>
                        </div>
                    </form>
                </div>
            </div>
            @if (!$sub_categories->isEmpty())
                <div class="sub-categories list-title">
                    <div> 
                        <h3>Podkategorije</h3> 
                        <div class="span-count">
                            <span class="subc">{{ count($sub_categories) }}</span>
                        </div>
                    </div>
                    <ul>
                        @foreach ($sub_categories as $sub_category)
                            <li>
                                {{ $sub_category->title }}
                                <div>
                                    <a class="details onhover" href="{{ route('sub_category_details', $sub_category->id) }}">Detalji</a>
                                    <a data-route="{{ asset('admin/deletesubcategory') }}" data-id="{{ $sub_category->id }}" class="delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
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
                            <span class="prodc">{{ count($products) }} </span>
                        </div>
                    </div>
                    <ul>
                        @foreach ($products as $product)
                            <li>
                                {{ $product->title }}
                                <div>
                                    <a class="details onhover" href="{{ route('product_details', $product->id) }}">Detalji</a>
                                    <a data-route="{{ asset('admin/productDelete') }}" data-id="{{ $product->id }}" class="delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
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
    </div>
    
</div>

<script>
    $('.new-kolona').click(function(){
        $('.add-kolona-div').addClass('show-add-kolona');
    });
    $('.add-kolona-div').click(function(e){
        $('.add-kolona-div').removeClass('show-add-kolona');
    });
    $('.add-kolona').click(function(e){
        e.stopPropagation();
    });
</script>

@endsection