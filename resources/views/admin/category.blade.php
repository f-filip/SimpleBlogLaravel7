@extends('admin.layout')
@section('content')
Category
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@foreach ($errors->all() as $error)
  <div class='alert alert-danger'>{{ $error }}</div>
@endforeach
<p>Create new category</p>
<form method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
      <input type="text" name="name">    
      <input type='submit' value='Store' class='btn btn-primary'>
</form>
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">category</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
      <tr>
        <th scope="row">{{$category->id}}</th>
        <td>{{$category->name}}</td>
        <td>
          <form method="POST" action="{!! route('admin.category.update', $category) !!}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <input type="text" name="name">    
                <input type='submit' value='Edit' class='btn btn-primary'>
          </form>
        </td>
        <td><a class="btn btn-danger" href="{!! route('admin.category.delete', $category) !!}">Delete</a>
        @endforeach
      </tr>
    </tbody>
  </table>
@endsection
