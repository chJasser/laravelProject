<?php

namespace App\Http\Controllers;

use App\Models\DisLike;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index($id)
    {
        $likes = Like::where("post_id", $id)->get();
        return $likes;
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

    public function store(int $id)
    {
        $post = Post::find($id);
        $formFields['user_id'] = auth()->id();
        $formFields['post_id'] = $id;
        Like::create($formFields);
        $dislike = DisLike::where("user_id", auth()->id())->first();

        if ($dislike !== null) {
            (new DisLikeController)->destroy($dislike);
        }

        return redirect()->route('forum', $post->forum_id)->with('message', 'like added successfully !');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        $like->delete();
    }
}
