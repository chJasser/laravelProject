<?php

namespace App\Http\Controllers;

use App\Models\DisLikeConvention;
use App\Models\LikeConvention;
use App\Models\Convention;
use Illuminate\Http\Request;

class DisLikeConventionController extends Controller
{
    public static function index($id)
    {
        $disLikes = DisLikeConvention::where("convention_id", $id)->get();
        return $disLikes;
    }

    public function store(int $id)
    {
        $convention = Convention::find($id);
        $formFields['user_id'] = auth()->id();
        $formFields['convention_id'] = $id;
        DisLikeConvention::create($formFields);
        $like = LikeConvention::where("user_id", auth()->id())->first();
        if ($like !== null) {
            (new LikeConventionController)->destroy($like);
        }
        return view('conventions.showConvention', [
            'convention' => $convention,
        ]);
       // return redirect()->route('convention', $convention->forum_id)->with('message', 'dislike added successfully !');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DisLikeConvention $dislike)
    {
        $dislike->delete();
    }
}
