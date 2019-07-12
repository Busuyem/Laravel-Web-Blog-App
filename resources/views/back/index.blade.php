@extends('layouts.app')
@section('title', 'All blog posts')
    @section('content')
           
        <div class="container">
            <div class="container col-md-8">
                 @include('inc.message')
           </div>
            <h2 class= "text-center" >All Posts</h2>
                @foreach($post as $posts)
                <div class="row">
                
                    <div class="col-md-3 col-sm-3">

                    <img src="storage/cover_image/{{$posts->cover_image}}" alt="No image" class = "rounded-circle w-50">

                    </div>




                <div class="col-md-9 col-sm-9">
            
                <div class="card">
                    <div class="card-header bg-light">
                        <h4><a href="{{route('posts.show', $posts->id)}}" >{{$posts->title}} </a><small><b> written by {{$posts->user->name}} </b> </small></h4> <small> on {{$posts->created_at}}</small>  
                    </div>
                    <div class="card-body">
                        <p> {{$posts->body}}</p>
                    </div>
                
                </div>
                </div>
                <br />
               
                </div>
                @endforeach
               <div class = "container col-md-4 pt-3"> {{$post->links()}}</div>
        </div>

        
    @endsection