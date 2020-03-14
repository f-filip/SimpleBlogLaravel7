@extends('admin.layout')
@section('content')
Posts
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<p>Create new post</p>
<p><a class="btn btn-primary" href="{{route('admin.post.create')}}">Create new post</a></p>
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">category</th>
        <th scope="col">tags</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->category->name}}</td>
        <td>
          @foreach($post->tags as $tag)
            {{$tag->name}}
          @endforeach
        </td>
      <td><a class="btn btn-primary" href="{!! route('admin.post.edit',$post) !!}">Edit</a></td>
        <td><a class="btn btn-danger" href="#">Delete</a>
        @endforeach
    </tbody>
  </table>

@endsection
