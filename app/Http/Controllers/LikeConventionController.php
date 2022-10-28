<?php

namespace App\Http\Controllers;

use App\Models\DisLikeConvention;
use App\Models\LikeConvention;
use App\Models\Convention;
use Illuminate\Http\Request;

class LikeConventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index($id)
    {
        $likes =  LikeConvention::where("convention_id", $id)->get();
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
        $convention = Convention::find($id);
        $formFields['user_id'] = auth()->id();
        $formFields['convention_id'] = $id;
        LikeConvention::create($formFields);
        $dislike = DisLikeConvention::where("user_id", auth()->id())->first();

        if ($dislike !== null) {
            (new DisLikeConventionController)->destroy($dislike);
        }

        return view('conventions.showConvention', [
            'convention' => $convention,
        ]);
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
    public function destroy(LikeConvention $like)
    {
        $like->delete();
    }
}
