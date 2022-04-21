@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>


<li><a href="{{ URL::to('Products') }}">View All Products</a></li>
<li><a href="{{ URL::to('product.create') }}">Create a product</a>

<div class="card uper">
  <div class="card-header">
    Edit product Data
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
      <form method="post" action="{{ route('Products.update', $product->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="country_name">Product Title:</label>
              <input type="text" class="form-control" name="title" value="{{ $product->title }}"/>
          </div>
          <div class="form-group">
              <label for="cases">Product Price :</label>
              <input type="text" class="form-control" name="price" value="{{ $product->price }}"/>
          </div>

          <div class="form-group">
            <label for="cases">Short Notes:</label>
            <input type="text" class="form-control" name="short_notes" value="{{ $product->short_notes }}"/>
        </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection
