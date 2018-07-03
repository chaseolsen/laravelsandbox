<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Bring in post
use App\Post;

// If you don't want to use Eloquent, to fetch data, you can use query by bringing in DB
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // Constructor function will run at the beginning
    public function __construct()
    {
        // This will check for authentication for routes and and exception for whatever routes youd like. Example, index and show (this is not route, its the blade file, index.blade.php and show.blade.php)
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //This funtion will run on /posts

        // Fetch all Posts (remember to bring in 'use App\Post;' up above)
        // $posts = Post::all();

        // You can also order results with this (example, by title, descending)
          $posts = Post::orderBy('created_at', 'desc')->get(); // Now the top post is the newest post

        // You can limite results as well like this
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();

        //You can also use pagination! Be sure to go to index.blade.php and uncomment the {{$posts->links()}}
        // $posts = Post::orderBy('title', 'desc')->paginate(1); // <-- change the 1 to whatever to how many you want to view each page.

        // You can also get a specific post by something like this
        // return Post::where('title', 'Post Two')->get();

        // Or you can use queries, after bring in 'use DB;' up top.
        // $posts = DB::select('SELECT * FROM posts');

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // This function will run on /posts/create
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
        // This will handle post requests

        // validate. It will make sure title and body are filled out before returning anything
        $this->validate($request, [
          'title' => 'required',
          'body' => 'required'
        ]);

        // Create Post (this is very similar to using tinker)
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id; // will get current logged in users id
        $post->save();

        // Post saved, now redirect to /posts and fill out messages.blade.php with 'success' and message of 'Post Created'
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // When going to posts/{id}, it will call this function, passing the id
        // Now we are finding post by id.
      $post = Post::find($id);

      return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // This function will run when navigating to /posts/{id}/edit
        $post = Post::find($id);

        // Check for correct user so no random can edit someone elses post
        if(auth()->user()->id !== $post->user_id){
          return redirect('http://localhost/laravelsandbox/public/posts')->with('error', 'Unauthorized Page');
        }


        return view('posts.edit')->with('post', $post);
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
        // This will run when submitting update request

        // validate again, making sure when updating post their is still values in title and body
        $this->validate($request, [
          'title' => 'required',
          'body' => 'required'
        ]);

        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        // Post saved, now redirect to /posts and fill out messages.blade.php with 'success' and message of 'Post Created'
        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // This function will happpen when submitting to PostsController@destroy
        $post = Post::find($id);

        // Check for correct user so no random can delete someone elses post
        if(auth()->user()->id !== $post->user_id){
          return redirect('http://localhost/laravelsandbox/public/posts')->with('error', 'Unauthorized Page');
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
