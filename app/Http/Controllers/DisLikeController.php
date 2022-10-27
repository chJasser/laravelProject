<?php

namespace App\Http\Controllers;

use App\Models\DisLike;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class DisLikeController extends Controller
{
    public static function index($id)
    {
        $disLikes = DisLike::where("post_id", $id)->get();
        return $disLikes;
    }

    public function store(int $id)
    {
        $post = Post::find($id);
        $formFields['user_id'] = auth()->id();
        $formFields['post_id'] = $id;
        DisLike::create($formFields);
        $like = Like::where("user_id", auth()->id())->first();
        if ($like !== null) {
            (new LikeController)->destroy($like);
        }
        return redirect()->route('forum', $post->forum_id)->with('message', 'dislike added successfully !');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DisLike $dislike)
    {
        $dislike->delete();
    }
}
