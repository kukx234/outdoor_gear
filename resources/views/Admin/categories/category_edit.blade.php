@extends('layouts.adminnav')

@section('content')

  <div class="category">

      <div class="form-container">

        <h3>Izmjena kategorije</h3>

        <form class="section-form" action="{{ route('category_edit_save', $category->id) }}" method="POST">
        @csrf
          <label for="title">Naslov kategorije</label>
          <input type="text" name="title" id="title" value="{{ $category->title }}">


          <div class="buttons">
            <button class="btn-save" type="submit">Spremi</button>
            <a class="btn-quit" href="{{ route('category_list') }}">Odustani</a>
          </div>
        </form>
  </div>
  @include('Admin.validation_error')
</div>
@endsection
