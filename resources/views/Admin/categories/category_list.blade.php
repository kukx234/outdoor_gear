@extends('layouts.adminnav')

@section('content')


<div class="category-list">

  <div class="category-list-form">

@include('Admin.success_msg')

    <h1>Kategorije</h1>

    <div><a class="new-category-btn" href="{{ route("new-category") }}" >Nova kategorija</a></div>

    <ul>
        @foreach ($categories as $category)
            <li>
                  <span>{{ $category->title }}</span>
                  <div class="list-buttons">
                    <a class="details onhover" href="{{ route('category_details', $category->id ) }}">Detalji</a>
                  </div>
            </li>
        @endforeach
    </ul>
    </div>
</div>
  @include('Admin.popup_warning')
@endsection
