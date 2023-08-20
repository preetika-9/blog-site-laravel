@extends('layout')
@section('head')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
@endsection

@section('main')
<main class="container" style="background-color: #fff">
<section id="contact-us">
<h1>Create New Post</h1>
@if (session('status'))
    <p>{{session('status')}}</p>
@endif
<div class="contact-form">
    <form action="{{route('blog.store')}}" methods="post" enctype="multipart/form-data">
        @csrf
        <label for="title"><span>Title</span></label>
        <input type="text" id="title" name="title" value="{{old('title')}}"/>
        @error('title')
           <p style="color:red; magrin-button: 25px"> {{message}}  </p>          
        @enderror

        <label for="image"><span>Image</span></label>
        <input type="file" id="image" name="image" />
        @error('image')
           <p style="color:red; magrin-button: 25px"> {{message}}  </p>          
        @enderror

        <label for="body"><span>Body</span></label>
        <textarea type="text" id="body" name="body" >{{old('body')}}</textarea>
        @error('body')
           <p style="color:red; magrin-button: 25px"> {{message}}  </p>          
        @enderror

        <input type="submit" value="Submit"/>
    </form>
</div>
</section>
</main>
    
@endsection

@section('scripts')
<script>
    CKEDITOR.replace( 'body' );
</script>
    
@endsection