<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Post;
use App\Models\Admin\Category;
use App\Models\Admin\Tag;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.post',[
            'posts'=>Post::All()
        ]);
    }
    public function create()
    {
        return view('admin.postcreate',[
            'categories' =>  Category::All(),
            'tags'       =>  Tag::All()
        ]);
    }
    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'slug'        => 'required|unique:posts|max:255',
            'title'       => 'required|max:255',
            'excerpt'     => 'required|max:255',
            'category_id' => 'required|integer',
            'tags'        => 'required',
            'body'        => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $post = new Post(request(['slug','title','excerpt','category_id','body']));
        $post->save();
        $post->tags()->attach(request('tags'));

        return redirect(route('admin.posts'))->with('status', 'Post added!');


    }
    public function edit(post $post)
    {
   
        return view ('admin.postupdate', [
            'post'=>$post,
            'categories' => Category::All(),
            'tags'=>Tag::All(),
            'posttags'=>$post->tags,
            ]);
    }
    public function update(post $post, request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'slug'        => 'required|max:255',
            'title'       => 'required|max:255',
            'excerpt'     => 'required|max:255',
            'category_id' => 'required|integer',
            'tags'        => 'required',
            'body'        => 'required',
        ]); 
        
        if($validator->fails())
        {
            return redirect()->back()
            ->withErrors('Fill in all requested fields')
            ->withInput($request->all());
        }

        $post->update(request(['slug','title','excerpt','body','category_id']));
        $post->tags()->sync($request->tags);
        return redirect(route('admin.posts'))->with('status','Post updated!');
    }

    public function delete()
    {

    }
    public function validatePost()
    {
        return request()->validate([
            'slug'=>'required',
            'litle'=>'required',
            'excerpt'=>'required',
            'body'=>'required',
            ]);
    }

}
