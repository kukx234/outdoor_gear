@extends('layouts.adminnav')

@section('content')
<h3>Izmjena kategorije</h3>
    <form action="{{ route('category_edit_save', $category->id) }}" method="POST">
        @csrf
        <label for="title">Naslov kategorije</label>
        <input type="text" name="title" id="title" value="{{ $category->title }}">

        <button type="submit">Spremi</button>
        <a href="{{ route('category_list') }}">Odustani</a>
    </form>
@endsection