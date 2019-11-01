@extends('layouts.adminnav')

@section('content')


    @if ($errors->any())
        <div class="">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <h1>Novi produkt</h1>


    <form action="{{ route('save_new_product') }}" method="POST">
        @csrf

        <label for="title">Naziv produkta</label>
        <input type="text" name="title" id="title">

        <label>Odabir kategorije</label>
        <select name="category_id" id="category-select">
            <option value="" selected>Odaberi kategoriju...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        <label>Odabir podkategorije</label>
        <select name="sub_category_id" id="sub-category-select">
            <option value="" selected>Odaberi podkategoriju.....</option>
        </select>

        <label for="description">Opis</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>

        <label for="price">Cijena</label>
        <input type="number" name="price" id="price">

        <label for="discount">Popust</label>
        <input type="number" name="discount" id="discount">

        <button type="submit">Spremi</button>
        <a href="{{ route('products_list') }}">Odustani</a>

    </form>


    <script>
             $("#sub-category-select").hide();
     
             $("#category-select").change(function(){
                 var category_id = this.value;
                 $.ajax({
                     type:"GET",
                     url:"ajaxcategorycall",
                     data: { category_id: category_id},
                     success:function(data){
                         console.log(data);
                         $("#sub-category-select").children().not(':first').remove();
                         if(data.category.sub_category.length > 0){
                             $("#sub-category-select").show();
                             $.each(data.category.sub_category, function(i, value){
                                 $("#sub-category-select").append(new Option(value.title,value.id));
                             });
                         }else{
                             $("#sub-category-select").hide();
                         }
                     }
                 })
             });
             
             
         </script>    


@endsection