@extends('layouts.adminnav')

@section('content')


<div class="category-list">

  <div class="category-list-form">

@include('Admin.success_msg');

    <h1>Podkategorije</h1>

    <div><a class="new-category-btn" href="{{ route('new_sub_category') }}">Nova podkategorija</a></div>

    @if (!empty($sub_categories))
        <ul>
            @foreach ($sub_categories as $sub_category)
                <li>
                    <span>{{ $sub_category->title }}</span>
                    <div class="list-buttons">

                      <a class="details" href="{{ route('sub_category_details', $sub_category->id) }}">Detalji</a>
                      <a class="makeup" href="{{ route('sub_category_edit', $sub_category->id) }}">Uredi</a>
                      <button class="delete" onclick="popupAlert('deletesubcategory',{{ $sub_category->id }})">Obriši</button>

                    </div>
                </li>
            @endforeach
        </ul>
    @endif
    </div>
</div>
@include('Admin.popup_warning')
@endsection
