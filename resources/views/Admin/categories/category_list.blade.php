@extends('layouts.adminnav')

@section('content')
@include('Admin.success_msg');

<div class="category-list">

  <div class="category-list-form">

    <h1>Kategorije</h1>

    <div><a class="new-category-btn" href="{{ route("new-category") }}" >Nova kategorija</a></div>

    <ul>
        @foreach ($categories as $category)
            <li>
                  <span>{{ $category->title }}</span>
                  <div class="list-buttons">
                    <a href="{{ route('category_details', $category->id ) }}">Detalji</a>
                    <a href="{{ route('category_edit', $category->id) }}">Uredi</a>
                    <button class="delete" onclick="popupAlert('categoriesdelete',{{ $category->id }})">Obriši</button>
                  </div>
            </li>
        @endforeach
    </ul>
    </div>
</div>
  @include('Admin.popup_warning')
@endsection
