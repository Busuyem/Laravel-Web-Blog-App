@extends('layouts.app')

    @section('title', 'Create your post')
    
    @section('content')
    
        <div class="container">
            <h1>Create Post</h1>
        <div class="col-md-10">
           <form action="{{route('posts.update', $post->id)}}" Method ="Post" class ="form-group" enctype = "multipart/form-data">
           @method('PUT')
           @csrf
            <div>
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" name="title" placeholder = "Title" value = "{{$post->title}}">
             </div><br />
                
            <div>
                <label for="title">Message</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control" placeholder = "What do you have in mind?">{{$post->body}}</textarea>

             </div>

             <div >
                <input type="file" class="mt-2" name = "cover_image">
             
             </div>

             <button type ="submit" class = "btn btn-info mt-3">Update</button>
        </div>
           
           
           </form>
        </div>

        
    @endsection