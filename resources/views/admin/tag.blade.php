@extends('admin.layout')
@section('content')
Tag
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@foreach ($errors->all() as $error)
  <div class='alert alert-danger'>{{ $error }}</div>
@endforeach
<p>Create new tag</p>
<form method="POST" action="{{route('admin.tag.store')}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
      <input type="text" name="name">    
      <input type='submit' value='Store' class='btn btn-primary'>
</form>
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">tag</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)
      <tr>
        <th scope="row">{{$tag->id}}</th>
        <td>{{$tag->name}}</td>
        <td>
          <form method="POST" action="{!! route('admin.tag.update', $tag) !!}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <input type="text" name="name">    
                <input type='submit' value='Edit' class='btn btn-primary'>
          </form>
        </td>
        <td><a class="btn btn-danger" href="{!! route('admin.tag.delete', $tag) !!}">Delete</a>
        @endforeach
      </tr>
    </tbody>
  </table>
@endsection
