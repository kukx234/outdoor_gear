@extends('layouts.adminnav')

@section('content')

    @if (Session::has('Success'))
        <p>{{ Session::get('Success') }}</p>
    @endif
    
    <h1>Kategorije</h1>

    <a href="{{ route("new-category") }}" >Nova kategorija</a>

    <ul>
        @foreach ($categories as $category)
            <li>
                <span>{{ $category->title }}</span>
                <a href="{{ route('category_details', $category->id ) }}">Detalji</a>
                <a href="{{ route('category-delete', $category->id ) }}">Obriši</a>
            </li>
        @endforeach
    </ul>

@endsection