@extends('layouts.adminnav')

@section('content')

    @if (Session::has('Success'))
        <p>{{ Session::get('Success') }}</p>
    @endif
<div class="category-list">

  <div class="category-list-form">

    <h1>Kategorije</h1>

    <div><a href="{{ route("new-category") }}" >Nova kategorija</a></div>

    <ul>
        @foreach ($categories as $category)
            <li>
                  <span>{{ $category->title }}</span>
                  <div class="list-buttons">
                    <a href="{{ route('category_details', $category->id ) }}">Detalji</a>
                    <a href="{{ route('category_edit', $category->id) }}">Uredi</a>
                    <button id="test" onclick="popupAlert('categories/delete',{{ $category->id }})">Obriši</button>
                  </div>
            </li>
        @endforeach
    </ul>
    </div>
    @include('Admin.popup_warning')
</div>
@endsection
