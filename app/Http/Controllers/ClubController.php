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
        $categories =["music", "sport", "art", "robotic","cinema", "other"];
        return view('clubs.create', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'email' => 'required|email|unique:clubs,email',
            'category' => 'required',


        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $attributes['logo'] = $name;
        }

        $attributes['user_id'] = auth()->id();
        club::create($attributes);
        return redirect('/clubs/manage')->with('success', 'Club created successfully.');

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
        $categories =["music", "sport", "art", "robotic","cinema", "other"];
        return view('clubs.edit', [
            'club' => $club,'categories' => $categories
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
            'email' => ['required', 'email', Rule::unique('clubs')->ignore($club->id)],
            'category' => 'required',
        ]);
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $formFields['logo'] = $name;
        }
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
    public function join(club $club)
    {
        $club->users()->attach(auth()->id());
        return redirect('/clubs/manage')->with('message', 'club joined successfully !');
    }
    public function leave(club $club)
    {
        $club->users()->detach(auth()->id());
        return redirect('/clubs/manage')->with('message', 'club left successfully !');
    }


    public function members(club $club)

    {

        $members = $club->users()->get();
        return view('clubs.members', ['users' =>$members]);
    }
}

