@extends('admin.layout')
@section('head')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
@endsection
@section('content')
Post create
@foreach ($errors->all() as $error)
  <div class='alert alert-danger'>{{ $error }}</div>
@endforeach

<form method="POST" action="{{route('admin.post.store')}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        Slug:</br><input type="text" name="slug" value="{{ old('slug') }}" >
        </br>Title: </br><input type="text" name="title" value="{{ old('title') }}" >
        </br>Excerpt:</br> <input type="text" name="excerpt" value="{{ old('excerpt') }}" >
        </br>Category:</br>
        <select id="category_id" name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select> 
        </br>Body</br><textarea id="body" name="body">{{ old('body') }}</textarea>
        </br>Tags:</br>
        <select id="tags" name="tags[]" multiple>
            @foreach ($tags as $tag)
                <option name="{{$tag->id}}" value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select> 
        </br><input type='submit' value='Store'>
    </form>
@endsection