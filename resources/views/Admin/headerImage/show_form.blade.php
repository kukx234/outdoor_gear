@extends('layouts.adminnav')

@section('content')
@include('Admin.validation_error')
    <h1>Slike naslovnice</h1>
    @if (Request::get('category_id'))
        <form action="{{ route('image-save') }}?category_id={{  Request::get('category_id') }}" method="POST" enctype="multipart/form-data">
    @elseif(Request::get('sub_category_id'))
        <form action="{{ route('image-save') }}?sub_category_id={{  Request::get('sub_category_id') }}" method="POST" enctype="multipart/form-data">
    @elseif(Request::get('product_id'))
        <form action="{{ route('image-save') }}?product_id={{  Request::get('product_id') }}" method="POST" enctype="multipart/form-data">
    @else 
        <form action="{{ route('image-save') }}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <label for="addimage">Odaberi sliku</label>
        <input type="file" name="image" id="addimage">

        <button type="submit">Spremi</button>
    </form>

    @if (!empty($images))
        @foreach ($images as $image)
            <img src="{{ asset("images/upload/$image->image")}}" alt="">
        @endforeach
    @endif
@endsection