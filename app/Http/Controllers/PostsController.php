<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//Library to delete image
use Illuminate\Support\Facades\Storage;


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
       // $post = Post::all();
        $post = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('back.index', compact('post'));
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
            'cover_image'=> 'nullable|image|max:1999'
        ]);

        //File Upload

        if($request->hasFile('cover_image')){
            //File name with extension

            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get file name

            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get the Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //File name to store

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);
        }

        else {
            $fileNameToStore = 'noimage.jpg';
        
        }

        
        
        $post = new Post;
        
         $post->title = $data['title'];
         $post->body = $data['body'];
         $post->cover_image = $fileNameToStore;
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
            'body' => 'required'
        ]);

        if($request->hasFile('cover_image')){
            //File name with extension

            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get file name

            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get the Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //File name to store

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);
        }

            $post = Post::findOrFail($id);
            $post->title = $data['title'];
            $post->body = $data['body'];
            if($request->hasFile('cover_image')){
                $post->cover_image = $fileNameToStore;
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
        
        return redirect('/posts')->with('delete', 'Your post has been deleted successfully.');
    }
}
