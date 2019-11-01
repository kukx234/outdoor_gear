@extends('layouts.adminnav')

@section('content')

@extends('Admin.validation_error')
    
    <h3>Unos nove podkategorije</h3>

    <form action="{{ route('sub_category_save') }}" method="POST">
        @csrf
        <label for="title">Naziv</label>
        <input type="text" name="title" id="title">

        <select name="categoryId">
            <option value="">Odaberite kategoriju ...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        <button type="submit">Spremi</button>
        <a href="{{ route('sub_category_list') }}">Odustani</a>
    </form>

@endsection