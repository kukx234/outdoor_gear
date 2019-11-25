@extends('layouts.adminnav')

@section('content')
    
@include('Admin.validation_error')
    <h1>Uredi produkt</h1>

    <form action="{{ route("product_edit_save", $product->id ) }}" method="POST">
        @csrf

        <label for="title">Naziv produkta</label>
        <input type="text" name="title" id="title" value="{{ $product->title }}">

        <label for="">Odabir kategorije</label>
        <select name="category_id" id="category-select">
            @foreach ($categories as $category)
                @if ($product->categories_id === $category->id )
                    <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endif
            @endforeach
        </select>

            <label for="" class="sub-lab">Odabir podkategorije</label>
            <select name="sub_category_id" id="sub-category-select">
                <option value="">Odabir podkategorije...</option>
                @if (!empty($subcategories))   
                    @foreach ($subcategories as $sub_category)
                        @if ($product->sub_categories_id === $sub_category->id)
                            <option value="{{ $sub_category->id }}" selected>{{ $sub_category->title }}</option>
                        @else
                            <option value="{{ $sub_category->id }}">{{ $sub_category->title }}</option>
                        @endif
                    @endforeach
                @endif
            </select>
   

        <label for="description">Opis</label>
        <textarea name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>

        <label for="price">Cijena</label>
        <input type="number" name="price" id="price" value="{{ $product->price }}">

        <label for="discount">Popust</label>
        <input type="number" name="discount" id="discount" value="{{ $product->discount }}">

        <button type="submit" >Spremi</button>
        <a onclick="goBack()" class="test">Odustani</a>
        
    </form>

    <script>

    $("#category-select").change(function(){
                 var category_id = this.value;
                 $.ajax({
                     type:"GET",
                     data: { category_id: category_id},
                     url:"ajaxcategorycall",
                     success:function(data){
                         if(data.category.sub_category != 0){
                            $("#sub-category-select").children().not(":first").remove();
                            $.each(data.category.sub_category, function(i, value){
                                $("#sub-category-select").append(new Option(value.title,value.id));
                            });
                         }else {
                            $("#sub-category-select").children().not(":first").empty();
                         }
                     }
                 })
             });
    </script>

@endsection

