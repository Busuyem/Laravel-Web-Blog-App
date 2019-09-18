@extends('layouts.app')
@section('title', 'All Forum posts')
    @section('content')
           
        <div class="container">
            @include('inc.message')
           <h2 class= "text-center text-success py-2" id = "allPost">Read All Posts</h2>
                @foreach($posts as $post)
                    @foreach($users as $user)
              <div class="card my-2">
              
                    <div class="card-header bg-secondary col-sm-5" id = "post-head">
                        <img src="{{asset('storage/'.$post->cover_image)}}" alt="No image" class = "rounded-circle w-25 float-right">
                            <h4><a href="{{route('posts.show', $post->id)}}" id = "post-head-header">{{$post->title}} </a><small><b> written by {{$user->name}} </b> </small></h4> <small><b> on {{ $post->created_at->format('j M Y H:i:s A ')}}</b></small>  
                        </div>
                        <div class="card-body">
                            <p> {{$post->body}}</p>
                        </div>
                
            </div>
                 @endforeach
            @endforeach
             <div class = "container col-md-4 p-2">{{$posts->links()}}</div>
        </div>
        
    @endsection