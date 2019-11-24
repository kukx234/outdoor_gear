@extends('layouts.adminnav')

@section('content')
@include('Admin.validation_error')
    <h1>Dodavanje slika naslovnice</h1>
    <form action="{{ route('image-save') }}" method="POST" enctype="multipart/form-data">
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