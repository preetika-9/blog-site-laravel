<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){
        return view('blogPosts.blog');
    }

    public function create(){
        return view('blogPosts.create-blog-post');
    } 

    public function store(Request $request){
    
        // $allInputs = $request->all();
        // dd($allInputs);

        // $input = $request->input('title');
        // dd($input);

        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'body' => 'required',
        ]);

        $title = $request->input('title');
        $slug = Str::slug($title, '-');
        $user_id = Auth::user()->id;
        $body = $request->input('body');



        // file uploading..
        $imagePath =  'storage/' . $request->file('image')->store('postsImages','public');

        $post = new Post();
        $post->title = $title;
        $post->slug = $slug;
        $post->user_id = $user_id;
        $post->body = $body;
        $post->imagePath = $imagePath;

        $post->save();

      return response()->json([
        'status'=>'success'
      ],201);
    }

    public function show(){
        return view('blogPosts.single-blog-post');
    }
}
