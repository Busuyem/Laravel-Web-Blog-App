@extends('layouts.app')
@section('title', 'Detailed post for ID N0:'." ". $post->id)
    @section('content')
    <div class = "container">
    @include('inc.message')
        <img src="/junecrud/public/storage/cover_image/{{$post->cover_image}}" alt="No image" class = "rounded-circle w-25 p-2">
    </div>
        <div class="container">
            
            <table class = "table table-striped">
                <tr>
                    <td><b>S/N</b></td>
                    <td><b>Post Title</></td>
                    <td><b>Message</td>
                </tr>
                <tbody>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}} <small>created by <b>{{$post->user->name}}</b></small></td>
                    <td>{{$post->body}}</td>
                </tbody>

            </table>
            @if(!Auth::guest())
                @if(auth()->user()->id == $post->user_id )
                <form action="{{route('posts.destroy', $post->id)}}" method = "post">
                    @method('delete')
                    <a href="{{route('posts.edit', $post->id)}}" class ="btn btn-primary">Edit</a> <button type="submit" class = "btn btn-danger">Delete</button> <a href="{{route('posts.index')}}" class ="btn btn-info">Back</a>
                
                @csrf
                </form>
                    @endif
                @endif
        
    @endsection