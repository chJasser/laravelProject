<?php

namespace App\Http\Controllers;

use App\Models\club;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clubs.index', [
            'clubs' => club::latest()
                ->filter(request(['search']))
                ->paginate(4)
        ]);
    }

    public function create()
    {
        return view('clubs.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
        $formFields['user_id'] = auth()->id();
        $formFields['owner'] = auth()->user()->name;
        club::create($formFields);
        return redirect('/clubs/manage')->with('message', 'new club created successfully !');
    }


    public function show(club $club)
    {

        return view('clubs.show', [
            'club' => $club
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(club $club)
    {
        return view('clubs.edit', [
            'club' => $club
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, club $club)
    {
        if ($club->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
       // dd($club);
        $club->update($formFields);

        return redirect('/clubs/manage')->with('message', 'club updated successfully !');
    }


    public function delete(club $club)
    {
        if ($club->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $club->delete();
        return redirect('/clubs/manage')->with('message', 'club deleted successfully !');
    }
    public function manage()
    {

        return  view('clubs.manage', ['clubs' => auth()->user()->clubs()->get()]);
    }
}

