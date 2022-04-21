@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Product Data
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('Products.store') }}">
          <div class="form-group">
              @csrf
              <label for="country_name">Product Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="cases">Price :</label>
              <input type="text" class="form-control" name="price"/>
          </div>

          <label for="cases">Shot_notes :</label>
          <input type="text" class="form-control" name="short_notes"/>

          <button type="submit" class="btn btn-primary">Add product</button>
      </form>
  </div>
</div>
@endsection
