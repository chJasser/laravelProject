<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Module;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index', [
            'courses' => Course::latest()
                ->filter(request(['search']))
                ->paginate(4)
        ]);
    }

    public function create()
    {
        $categories = [
            'Web Development',
            'Mobile Development',
            'Design',
            'Marketing',
            'Business',
            'Photography',
            'Music',
            'Lifestyle',
            'IT & Software',
            'Office Productivity',
            'Personal Development',
            'Teaching & Academics',
        ];
        $modules = Module::latest()->get();
        return view('courses.create', compact('categories'),compact('modules'));
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
            'description'=>'required',
            "category"=>'required',
            "module_id"=>'required',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $formFields['image'] = $name;
        }
        $formFields['user_id'] = auth()->id();
        $formFields['module_id'] = $request->module_id;
        Course::create($formFields);

        return redirect('/courses/manage')->with('message', 'new course created successfully !');
    }


    public function show(Course $course)
    {

        return view('courses.show', [
            'course' => $course
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = [
            'Web Development',
            'Mobile Development',
            'Design',
            'Marketing',
            'Business',
            'Photography',
            'Music',
            'Lifestyle',
            'IT & Software',
            'Office Productivity',
            'Personal Development',
            'Teaching & Academics',
        ];
        return view('courses.edit', [
            'course' => $course,"categories"=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        if ($course->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title'=>'required',
            'description'=>'required',
            "category"=>'required',

        ]);
       // dd($course);
       if($request->hasFile('image')){
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $formFields['image'] = $name;
    }
        $course->update($formFields);

        return redirect('/courses/manage')->with('message', 'course updated successfully !');
    }


    public function delete(Course $course)
    {
        if ($course->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $course->delete();
        return redirect('/courses/manage')->with('message', 'course deleted successfully !');
    }
    public function manage()
    {

        return  view('courses.manage', ['courses' => auth()->user()->courses()->get()]);
    }
}

