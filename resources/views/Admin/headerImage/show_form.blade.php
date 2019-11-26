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
            <div class="image-box">
              <img data-fancybox="gallery" src="{{ asset("images/upload/$image->image")}}" alt="">
            </div>
            <h3>Naziv slike</h3>
              <div class="img-buttons">
                <a href="#"><i class="fas fa-trash-alt"></i></a>
                <a href="#"><i class="fas fa-cog"></i></a>
              </div>
          </div>
        @endforeach
      </div>
    @endif

    <script type="text/javascript">

        $("[data-fancybox='gallery']").fancybox({
          afterClose: function () {
               parent.location.reload(true);
           }
        });

        $("#addimage").change(function(){
          var file = $('#addimage')[0].files[0];
            $(".input-text").text(file.name);
        });
    </script>


@endsection
