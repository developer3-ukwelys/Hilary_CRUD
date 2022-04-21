@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Product Title</td>
          <td>Price (USD)</td>
          <td>Short Notes</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->short_notes}}</td>
            <td><a href="{{ route('Products.edit', $product->id)}}" class="btn btn-primary">Edit</a></td><br/>
            <td>
                <form action="{{ route('Products.destroy', $product->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
  </table>
<div>
    <a href="{{ route('Products.create')}}" class="btn btn-primary">CREATE A PRODUCT</a>


    <script>
        function showModel(id) {
            var frmDelete = document.getElementById("delete-frm");
            frmDelete.action = 'Products/'+id;
            var confirmationModal = document.getElementById("deleteConfirmationModel");
            confirmationModal.style.display = 'block';
            confirmationModal.classList.remove('fade');
            confirmationModal.classList.add('show');
        }

        function dismissModel() {
            var confirmationModal = document.getElementById("deleteConfirmationModel");
            confirmationModal.style.display = 'none';
            confirmationModal.classList.remove('show');
            confirmationModal.classList.add('fade');
        }
        </script>


@endsection





