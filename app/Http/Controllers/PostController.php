<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        // On transmet les Post à la vue
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
    // 1. La validation
    $this->validate($request, [
        'message' => 'bail|required|max:255',
    ]);
    
    // 3. On enregistre les informations du Post
    Post::create([
        "message" => $request->message,
    ]);

    // 4. On retourne vers tous les posts : route("posts.index")
    return redirect(route("posts.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("posts.modifier", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {

        
        $this->validate($request, [
            'message' => 'bail|required|max:255',
        ]);
    
        $post = Post::where('id', $id)->first(); 

        
    
        // 3. On met à jour les informations du Post
        $post->update([
            "message" => $request->message,
        ]);
        
        // 4. On affiche le Post modifié : route("posts.show")
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

    // Redirection route "posts.index"
    return redirect(route('posts.index'));
    }
}
