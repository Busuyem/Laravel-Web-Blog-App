@extends('layouts.app')
@section('title', 'Detailed post for ID N0:'." ". $post->id)
    @section('content')

   
    <div class="container py-5">
    <div class="card">
        <div class="card-header">
            <div class = "container text text-center" >

                <img src="{{asset('storage/'.$post->cover_image)}}" alt="No image" class = "rounded-circle w-25 py-2 col-md-2">
            </div>
            <h3>Created by <b>{{$post->user->name}}</b></h3>
        </div>
        <div class="card-body table-info">
         
             @include('inc.message')
            <table class = "table table-info">
                <tr class = "table table-primary">
                    
                    <td><b>Post Title</></td>
                    <td><b>Message</td>
                </tr>
                <tbody>
                    
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                </tbody>

            </table>
            @if(!Auth::guest())
                @if(auth()->user()->id == $post->user_id )
                <form action="{{route('posts.destroy', $post->id)}}" method = "post" class = "text-center">
                    @method('delete')
                    <a href="{{route('posts.edit', $post->id)}}" class ="btn btn-primary">Edit</a> <button type="submit" class = "btn btn-danger">Delete</button> <a href="{{route('posts.index')}}" class ="btn btn-info">Back</a>
                
                @csrf
                </form>
                    @endif
                @endif
            </div>
        </div>
    @endsection