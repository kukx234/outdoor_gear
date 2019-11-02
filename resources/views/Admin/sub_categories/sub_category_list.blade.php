@extends('layouts.adminnav')

@section('content')

    @if (Session::has('Success'))
        {{ Session::get('Success') }}
    @endif
    
    <h1>Podkategorije</h1>

    <a href="{{ route('new_sub_category') }}">Nova podkategorija</a>

    @if (!empty($sub_categories))
        <ul>
            @foreach ($sub_categories as $sub_category)
                <li>
                    <span>{{ $sub_category->title }}</span>
                    <a href="{{ route('sub_category_details', $sub_category->id) }}">Detalji</a>
                    <a href="{{ route('sub_category_delete', $sub_category->id) }}">Obriši</a>
                </li>
            @endforeach
        </ul>
    @endif

@endsection