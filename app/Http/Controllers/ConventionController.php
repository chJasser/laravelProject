<?php

namespace App\Http\Controllers;

use App\Models\Convention;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ConventionController extends Controller
{
    public static function index()
    {
        //  dd(request());
        return view('conventions.index', [
            'conventions' => Convention::latest()
                ->filter(request(['search']))
                ->paginate(4)
        ]);
    }
    public static function showAll()
    {

        $conventions = Convention::all();
       return $conventions;
    }
    public static function getByid($id){
        $convention = Convention::find($id);
        return $convention;
    }
    public function show(Convention $convention)
    {

        return view('conventions.show', [
            'convention' => $convention,
            'reclamations'=> $convention->reclamation()->get(),
            'reclamation_size'=>$convention->reclamation()->get()->count()
        ]);
    }
    public function showConvention(Convention $convention)
    {

        return view('conventions.showConvention', [
            'convention' => $convention,
        ]);
    }
    public function create()
    {
        return view('conventions.create');
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

        ]);
        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();
        $formFields['owner'] = auth()->user()->name;
        Convention::create($formFields);

        return redirect('/conventions/manage')->with('message', 'new Convention created successfully !');
    }
    public function edit(Convention $convention)
    {
        return view('conventions.edit', [
            'convention' => $convention
        ]);
    }
    public function update(Request $request, Convention $convention)
    {
        if ($convention->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $convention->update($formFields);

        return redirect('/conventions/manage')->with('message', 'Convention updated successfully !');
    }
    public function delete(Convention $convention)
    {
        if ($convention->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $convention->delete();
        return redirect('/conventions')->with('message', 'Convention deleted successfully !');
    }
    public function manage()
    {
        $conventions = Convention::all();
        //return  view('conventions.manage', ['conventions' => auth()->user()->conventions()->get()]);
        return  view('conventions.manage', ['conventions' => $conventions]);
    }
}
