<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $id)
    {
        $formFields = $request->validate([
            'content' => 'required',
        ]);
        $formFields['user_id'] = auth()->id();
        $formFields['forum_id'] = $id;
        Post::create($formFields);
        return redirect()->route('forum', $id)->with('message', 'Post added successfully !');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request, Post $post)
    {

        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'content' => 'required',
        ]);
        $post->update($formFields);

        return redirect()->route('forum' , $post->forum_id)->with('message', 'Post updated successfully !');
    }


    public function destroy(Post $post)
    {
        $id = $post->forum_id;
        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $post->delete();
        return redirect()->route('forum', $id)->with('message', 'post deleted successfully !');
    }
}
