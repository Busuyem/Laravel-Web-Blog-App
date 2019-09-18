@extends('layouts.app')
@section('title', 'Welcome to your dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(count($user) < 1)
            <div class="container text-center py-5">
            
               <h3 class = "text-success">Congrats on your successful registration! </h3> <a href="{{route('posts.create')}}"  class = "btn btn-success text-center" >Create Your First Post</a>
            </div>


            @elseif($user)
            <div class="container text-center pb-4">
            
                <h3 class = "text-success pt-3">Welcome again, {{ auth()->user()->name."!" }}</h3> <a href="{{route('posts.create')}}"  class = "btn btn-success text-center" >Create Additional Post Here</a>
            </div>

            @endif

            

            @if(count($user)>0)
           <div class="container col-md-10">
            @foreach($user as $post)

           
            <div class="card max-auto">
                
                    <div class="card-header bg-light justify-content-centered" id= "post-head">
                    <img src="storage/{{$post->cover_image}}" alt="No image" class = "rounded-circle w-25 col-md-2 float-right">
                        <h4 class = "text-primary" id="post-header">{{$post->title}}</h4> <small> {{$post->created_at->format('j M Y H:i:s A ')}}</small>  
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
                <div class = "container col-md-4 p-2">{{$posts->links()}}</div>
            </div>
        </div>

        
</div>
@endsection