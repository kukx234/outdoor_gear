@extends('layouts.adminnav')

@section('content')
    <h1>{{ $sub_category->title }}</h1>

    <form action="{{ route("sub_edit_save" , $sub_category->id ) }}" method="POST">
        @csrf
        <label for="title">Naslov podkategorije</label>
        <input type="text" name="title" id="title" value="{{ $sub_category->title }}">

        <label for="">Kategorija</label>
        <select name="categoryId">
            @foreach ($categories as $category)
                @if ($category->id == $sub_category->categories_id)
                    <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endif
            @endforeach
        </select>

        <button type="submit">Spremi</button>
        <a href="">Odustani</a>
    </form>
@endsection