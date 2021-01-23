<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Supports\Facedes\DB;
use Illuminate\Support\Facades\Storage;
//use App\Models\User;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , ['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $allPost = Post::orderBy('title', 'desc')->get();
       //return $allPost = Post::where('title','Post level two')->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'cover_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
            if($request->hasFile('cover_img')){
                $fileExtension = $request->file('cover_img')->getClientOriginalName();
                $fileName = pathinfo($fileExtension, PATHINFO_FILENAME);
                $extension = $request->file('cover_img')->extension();
                $name = $fileName.'_'.time().'.'.$extension;
                 $path = $request->file('cover_img')->storeAs('public/images',$name) ;
            }else{
                $name = 'noimage.jpg';
            }
          
       

         $post = new Post;
         $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_img =$name; 
        $post->save();

        return redirect('/posts')->with('success', 'Post Created Successfully');

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
        return view('posts.viewPost')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
             return redirect('/posts')->with('error', 'Unauthenticated User');
        }
        return view('posts.edit')->with('post',$post);
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
         $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);
            $post = Post::find($id);

            if($request->hasFile('cover_img')){
                $request->validate(
                    ['cover_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048']
                );
                $fileExtension = $request->file('cover_img')->getClientOriginalName();
                $fileName = pathinfo($fileExtension, PATHINFO_FILENAME);
                $extension = $request->file('cover_img')->extension();
                $name = $fileName.'_'.time().'.'.$extension;

                $path = $request->file('cover_img')->storeAs('public/images',$name);
                if(file_exists($path)){
                    unlink($path.$name);
                }
                $post->cover_img=$name;
            }
            $post->title = $request->input('title');
          $post->body = $request->input('body');
         $post->save();

        return redirect('/posts')->with('success', 'Post Updated successsfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
          if(auth()->user()->id !== $post->user_id){
             return redirect('/posts')->with('error', 'Unauthenticated User');
        }
        if ($post->cover_img != 'noimage.jpg') {
            Storage::delete('public/images/' . $post->cover_img);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted Successfully');
    }
}
