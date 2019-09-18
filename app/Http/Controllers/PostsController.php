<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
//Library to delete image
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{
    
    public function  __Construct(){

        $this->middleWare('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        $posts = Post::orderBy('created_at', 'desc')->paginate(2);
        
        return view('back.index', compact('posts', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            return view('back.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        
       $data = $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'user_id' =>'',
            'cover_image'=> 'sometimes|file|image|max:1999|mimes:jpeg,jpg,png,pdf'
           
        ]);

         if($request->hasFile('cover_image')){

             $image = $request->cover_image->store('cover_image', 'public');

             /*$image = Image::make($request->file('cover_image')->getRealPath())->fit(300, 300);
             //$image = image::make($request->cover_image)->fit(300, 300);
            
             $image->save($request->cover_image, 70)->encode('jpg');
             dd($image);
             */
             
        }

        
             
            
        //File Upload-Second Method

        $post = new Post;
        
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->cover_image = $image;
        $post->user_id = auth()->user()->id;
        

        $post->save();

        return redirect('/posts')->with('create', 'Your post is successfully created.');

        }
         

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('back.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if(auth()->user()->id !== $post->user_id){

            return redirect('posts')->with('error', 'unathorised');
        }

         return view('back.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image'=> 'sometimes|file|image|max:1999'
        ]);

       
           
       //File Upload-Second Method

       $post = Post::findOrFail($id);
       
       $post->title = $data['title'];
       $post->body = $data['body'];

       if($request->hasFile('cover_image')){

       $post->cover_image =  $request->cover_image->store('cover_image', 'public');

        
    }
      
       

    $post->update();
    return redirect('posts/'.$post->id)->with('update', 'Message updated successfully.');


    }

       

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        
        if(auth()->user()->id !== $post->user_id){

            return redirect('posts')->with('error', 'unathorised');
        }

        if($post->cover_image !== 'noimage.jpg'){

                Storage::delete('public/storage/cover_image/'.$post->cover_image);

        }

        $post->delete();
        
        return redirect('/dashboard')->with('delete', 'Your post has been deleted successfully.');
    }

      
}
