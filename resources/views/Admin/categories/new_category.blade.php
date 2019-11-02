@extends('layouts.adminnav')

@section('content')

@include('Admin.validation_error')
<h3>Unos nove kategorije</h3>
    
    <form action="{{ route('category-save') }}" method="POST">
        
        @csrf
       <label for="title">Naziv kategorije</label>
       <input type="text" name="title" id="title">

        <div>
            <button type="submit">Spremi</button>
            <a href="{{ route('category_list') }}">Odustani</a>
        </div>
    </form>
@endsection