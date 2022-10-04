<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        return view('courses.create');
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
        ]);
        $formFields['user_id'] = auth()->id();
        $formFields['owner'] = auth()->user()->name;
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
        return view('courses.edit', [
            'course' => $course
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
        ]);
       // dd($course);
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

