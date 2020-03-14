@extends('admin.layout')
@section('head')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
@endsection
@section('content')
Post update
@foreach ($errors->all() as $error)
  <div class='alert alert-danger'>{{ $error }}</div>
@endforeach

<form method="POST" action="{!! route('admin.post.update',$post) !!}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        Slug:</br><input type="text" name="slug" value="{{$post->slug}}" >
        </br>Title: </br><input type="text" name="title" value="{{$post->title}}">
        </br>Excerpt:</br> <input type="text" name="excerpt" value="{{$post->excerpt}}" >
        </br>Category:</br>
        <select id="category_id" name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{ $category->id === $post->category->id ? "selected='selected'" : "" }}>{{$category->name}}</option>
            @endforeach
        </select> 
        </br>Body</br><textarea id="body" name="body">{{$post->body}}</textarea>


    </br>Tags:</br>
    
    <select id="tags" name="tags[]" multiple>
        @foreach ($tags as $tag)
            <option name="{{$tag->id}}" value="{{$tag->id}}"
                @foreach ($posttags as $postTag)
                    {{ $postTag->id === $tag->id ? "selected" : "" }}
                @endforeach
                >{{$tag->name}}</option>
        @endforeach
    </select>



        </br><input type='submit' value='Store'>
    </form>
@endsection