@extends('layouts.adminnav')

@section('content')


<div class="category-list">

  <div class="category-list-form">

@include('Admin.success_msg')

    <h1>Kategorije</h1>

    <div>
        <a class="new-category-btn" href="{{ route("new-category") }}" >
          <i class="fas fa-plus"></i>
          <span>Nova kategorija</span>
        </a>
    </div>

    <ul>
        @foreach ($categories as $category)
            <li>
                  <span>{{ $category->title }}</span>
                  <div class="list-buttons">
                    <a class="details onhover" href="{{ route('category_details', $category->id ) }}">Detalji</a>
                    <a class="addImg" href="{{ route('add-image')}}?categories_id={{ $category->id }}">
                      <i class="fas fa-images"></i>
                      <span>dodaj sliku</span>
                    </a>
                  </div>
            </li>
        @endforeach
    </ul>
    </div>
</div>
  @include('Admin.popup_warning')

@endsection
