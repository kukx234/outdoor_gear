@extends('layouts.adminnav')

@section('content')

@include('Admin.success_msg');

    <h1>Podkategorije</h1>

    <a href="{{ route('new_sub_category') }}">Nova podkategorija</a>

    @if (!empty($sub_categories))
        <ul>
            @foreach ($sub_categories as $sub_category)
                <li>
                    <span>{{ $sub_category->title }}</span>
                    <div class="list-buttons">
                        <a href="{{ route('sub_category_details', $sub_category->id) }}">Detalji</a>
                        <a href="{{ route('sub_category_edit', $sub_category->id) }}">Uredi</a>
                        <a class="delete" onclick="popupAlert('deletesubcategory',{{ $sub_category->id }})">Obriši</a>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

    @include('Admin.popup_warning')
@endsection
