<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reclamations.index', [
            'reclamations' => Reclamation::latest()
                ->filter(request(['search']))
                ->paginate(4)
        ]);
    }

    public function create()
    {
        $conventions= ConventionController::showall();
        return view('reclamations.create',[
            'conventions' => $conventions
        ]);
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
            'title'=>'required',
            'content'=>'required',
            'convention_id'=>'required'
        ]);
        $formFields['user_id'] = auth()->id();
        $formFields['owner'] = auth()->user()->name;
        $formFields['status'] =false;
        Reclamation::create($formFields);
        return redirect('/reclamations/manageUser')->with('message', 'new reclamation created successfully !');
    }

   
    public function show(Reclamation $reclamation)
    {
      $selected = ConventionController::getByid($reclamation->convention_id);
        return view('reclamations.show', [
            'reclamation' => $reclamation,'selected'=>$selected
        ]);
    }
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reclamation $reclamation)
    {
        $conventions = ConventionController::showall();
        return view('reclamations.edit', [
            'reclamation' => $reclamation,'conventions'=>$conventions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reclamation $reclamation)
    {
        if ($reclamation->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        $reclamation->update($formFields);

        return redirect('/reclamations/manageUser')->with('message', 'Reclamation updated successfully !');
    }
    public function delete(Reclamation $reclamation)
    {
        if ($reclamation->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $reclamation->delete();
        return redirect('/reclamations/manageUser')->with('message', 'reclamation deleted successfully !');
    }
    public function deleteAdmin(Reclamation $reclamation)
    {
        $reclamation->delete();
        return redirect('/reclamations/manage')->with('message', 'reclamation deleted successfully !');
    }
    public function manage()
    {
        $reclamations = Reclamation::all();  
       // return  view('reclamations.manage', ['reclamations' => auth()->user()->reclamations()->get()]);
       return  view('reclamations.manage', ['reclamations' => $reclamations]);
    }
    public function manageUser()
    {
        //$reclamations = Reclamation::all();  
        return  view('reclamations.manageUser', ['reclamations' => auth()->user()->reclamations()->get()]);
      // return  view('reclamations.manage', ['reclamations' => $reclamations]);
    }

}
