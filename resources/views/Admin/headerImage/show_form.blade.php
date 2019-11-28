@extends('layouts.adminnav')

@section('content')
@include('Admin.validation_error')

<div class="category-list-form">

    <h1>Dodavanje slike</h1>

    @if (Request::get('categories_id'))
        <form class="form-sect" action="{{ route('image-save') }}?category_id={{  Request::get('categories_id') }}" method="POST" enctype="multipart/form-data">
    @elseif(Request::get('subcategory_id'))
        <form class="form-sect" action="{{ route('image-save') }}?subcategory_id={{  Request::get('subcategory_id') }}" method="POST" enctype="multipart/form-data">
    @elseif(Request::get('product_id'))
        <form class="form-sect" action="{{ route('image-save') }}?product_id={{  Request::get('product_id') }}" method="POST" enctype="multipart/form-data">
    @else
        <form class="form-sect" action="{{ route('image-save') }}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
          <div class="section-form">
            <div class="choose-file">
                <input type="file" name="image" id="addimage">
                <div>
                    <span class="input-text">Odaberi sliku... </span>
                    <button type="button" name="button">Odaberi</button>
                </div>
            </div>
            <div class="image-buttons">
              <button class="btn-save" type="submit">Spremi</button>
              <a class="btn-back" onclick="goBack()">Nazad</a>
            </div>

          </div>
        </form>

</div>

    @if (!empty($images))
      <div class="images-list">
        @foreach ($images as $image)
          <div class="main-img-box">
              <a class="image-box" data-fancybox="gallery" href="{{ asset("images/upload/$image->image") }}">
                <img  src="{{ asset("images/upload/$image->image")}}" alt="">
              </a>
              <h3>{{ $image->image }}</h3>
              <div class="img-buttons">
                  <button class="delete-img" value="{{ $image->id }}"><i class="fas fa-trash-alt"></i></button>
                  <button><i class="fas fa-cog"></i></button>
              </div>
          </div>
        @endforeach
      </div>
    @endif

    <script type="text/javascript">

        $(".image-box").fancybox({});

        $("#addimage").change(function(){
            var file = $('#addimage')[0].files[0];
            $(".input-text").text(file.name);
        });

        $(".delete-img").click(function(){
            $(this).parent().parent().addClass("remove");

            var classes = $(".current").attr("class"); 
            var model_name = classes.split(" ");
            var img_id = $(this).val();      

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });
          
            $.ajax({
                type:'POST',
                url: 'deleteImage',
                data: { image_id : img_id, model: model_name[0]},
                success: function(){
                    $(".remove").remove();
                }
            });
        });
    </script>

@endsection
