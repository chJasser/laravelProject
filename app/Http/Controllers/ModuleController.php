<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modules.manage', [
            'modules' => Module::latest()
                //->filter(request(['search']))
                ->paginate(4)
        ]);
    }

    public function create()
    {

        $modules = Module::latest()->get();
        return view('modules.create', compact('modules'));
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
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $formFields['image'] = $name;
        }
        
        Module::create($formFields);
        
        return redirect('/modules/manage')->with('message', 'new module created successfully !');
    }


    public function show(Module $module)
    {

        return view('modules.show', [
            'module' => $module
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {

        return view('modules.edit', [
            'module' => $module
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        
        $formFields = $request->validate([
            'name'=>'required',
            'description'=>'required',

        ]);
       // dd($module);
       if($request->hasFile('image')){
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $formFields['image'] = $name;
    }
        $module->update($formFields);

        return redirect('/modules/manage')->with('message', 'module updated successfully !');
    }


    public function delete(Module $module)
    {
       
        $module->delete();
        return redirect('/modules/manage')->with('message', 'module deleted successfully !');
    }
    public function manage()
    {
        $modules = Module::latest()->get();
        return  view('modules.manage', compact('modules'));
    }

    public function courses(Module $module)

    {

        $courses = $module->courses()->get();
        return view('modules.courses', compact('courses'));
    }
}

