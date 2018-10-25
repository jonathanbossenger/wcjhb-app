<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ( ! $user) {
            return 'Invalid User';
        }
        $posts = Post::where('user_id', $user->id)->get();
        return view('posts.index', compact('posts'));
    }

    public function apiIndex()
    {
        $user = Auth::user();
        if ( ! $user) {
            return ['Invalid User'];
        }
        $posts = Post::where('user_id', $user->id)->get();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function apiStore(Request $request)
    {
        $user = Auth::user();
        if ( ! $user) {
            return ['status' => 'error', 'message' => 'Invalid user credentials'];
        }

        $additionalData['user_id'] = $user->id;
        $request->merge($additionalData);

        $post = Post::where('user_id', $user->id)->where('post_id', $request->post_id)->first();

        if ($post){
            $post->update($request->all());
            Log::info(['apiCreatePost' => ['Post Updated' => $post]]);
        }else {
            $post = Post::create($request->all());
            Log::info(['apiCreatePost' => ['Post Created' => $post]]);
        }

        return ['status' => 'success', 'message' => 'Post created', 'post' => $post];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $user = Auth::user();
        if ( ! $user) {
            return ['status' => 'error', 'message' => 'Invalid user credentials'];
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the Post.
     *
     * @param \App\Http\Requests\StorePost $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Storepost $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
