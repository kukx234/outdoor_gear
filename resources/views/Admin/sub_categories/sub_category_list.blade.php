@extends('layouts.adminnav')

@section('content')


<div class="category-list">

  <div class="category-list-form">

@include('Admin.success_msg')

    <h1>Podkategorije</h1>

    <div class="icon-plus">
      <a class="new-category-btn" href="{{ route('new_sub_category') }}">
        <i class="fas fa-plus"></i>
        <span>Nova podkategorija</span>
      </a>
    </div>

    @if (!empty($sub_categories))
        <ul>
            @foreach ($sub_categories as $sub_category)
                <li>
                    <span>{{ $sub_category->title }}</span>
                    <div class="list-buttons">

                      <a class="details onhover" href="{{ route('sub_category_details', $sub_category->id) }}">Detalji</a>
                      <a class="addImg" href="{{ route('add-image')}}?subcategory_id={{ $sub_category->id }}">
                        <i class="fas fa-images"></i>
                        <span>dodaj sliku</span>
                      </a>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
    </div>
</div>
@endsection
