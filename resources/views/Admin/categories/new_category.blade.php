@extends('layouts.adminnav')

@section('content')

<div class="category">
        
    <div class="form-container">

    <h3>Unos nove kategorije</h3>
        
        <form class="section-form" action="{{ route('category-save') }}" method="POST">

            @csrf
        <label for="title">Naziv kategorije</label>
        <input type="text" name="title" id="title">
        

            <div class="buttons">
                <button class="btn-save" type="submit">Spremi</button>
                <a class="btn-quit" href="{{ route('category_list') }}">Odustani</a>
            </div>
        </form>
    </div>
    @include('Admin.validation_error')
</div>

@endsection