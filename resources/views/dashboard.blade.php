@extends('layouts.app')
@section('title', 'Welcome to your dashboard')
@section('content')
<div class="container">
    
        <div class="row justify-content-center">
        @if(count($user) < 1)
            <div class="container text-center pb-4">
            
               <h3 class = "text-success">Congrats on your successful registration! </h3> <a href="{{route('posts.create')}}" class = "btn btn-success text-center">Create Your First Post</a>
            </div>
            @endif

            @if(count($user)>0)
           <div class="container col-md-10">
            @foreach($user as $post)

            <img src="storage/cover_image/{{$post->cover_image}}" alt="No image" class = "rounded-circle w-25 p-2">
            <div class="card">
                    <div class="card-header bg-light">
                        <h4 class = "text-primary">{{$post->title}}</h4> <small> {{$post->created_at}}</small>  
                    </div>

                    <div class="card-body">
                        <p> {{$post->body}}</p>
                    </div>
                
                </div>

                <form action="{{route('posts.destroy', $post->id)}}" method = "post" class = "pt-2">
                    @method('delete')
                    <a href="{{route('posts.edit', $post->id)}}" class ="btn btn-primary">Edit</a> <button type="submit" class = "btn btn-danger">Delete</button> <a href="{{route('posts.index')}}" class ="btn btn-info">Back</a>
                
                @csrf
                </form><br />
                 @endforeach
                 </div>
                 
                </div>
                @else
                <H3>You have no post yet!</H3>
                @endif
                </div>
                    
            </div>
        </div>

        
</div>
@endsection