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
                <a href="{{ route('category_edit', $category->id) }}">Uredi</a>
                <button id="test" onclick="popupAlert('categories/delete',{{ $category->id }})">Obriši</button>
            </li>
        @endforeach
    </ul>
    @include('Admin.popup_warning')
@endsection

