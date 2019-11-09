@extends('layouts.adminnav')

@section('content')
<div class="category">

    <div class="form-container">


        <h3>Unos nove podkategorije</h3>

        <form class="section-form" action="{{ route('sub_category_save') }}" method="POST">
          @csrf
          <label for="title">Naziv podkategorije</label>
          <input type="text" name="title" id="title">

          <label for="">Kategorija</label>
        <select name="categoryId">
            <option value="">Odaberite kategoriju ...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        <div class="buttons">
          <button class="btn-save" type="submit">Spremi</button>
          <a class="btn-quit" href="{{ route('sub_category_list') }}">Odustani</a>
          </div>
        </form>
    </div>
    @include('Admin.validation_error')
</div>

@endsection
