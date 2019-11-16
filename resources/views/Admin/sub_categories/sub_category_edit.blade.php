@extends('layouts.adminnav')

@section('content')

  <div class="category">

      <div class="form-container">

        <h3>Izmjena podkategorije</h3>

        <form class="section-form" action="{{ route("sub_edit_save" , $sub_category->id ) }}" method="POST">
        @csrf
          <label for="title">Naslov podkategorije</label>
          <input type="text" name="title" id="title" value="{{ $sub_category->title }}">

          <label for="">Kategorija</label>
          <select name="categoryId">
            @foreach ($categories as $category)
                @if ($category->id == $sub_category->categories_id)
                    <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endif
            @endforeach
          </select>

          <div class="buttons">
            <button class="btn-save" type="submit">Spremi</button>
            <a class="btn-quit" href="">Odustani</a>
          </div>

    </form>

  </div>
  @include('Admin.validation_error')
</div>

@endsection
