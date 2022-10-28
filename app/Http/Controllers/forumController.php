<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class forumController extends Controller
{
    public function index()
    {

        return view('Forum.index', [
            'forums' => Forum::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(4)
        ]);
    }

    public function show(Forum $forum)
    {

        $posts = Post::where("forum_id", $forum->id)->get();
        return view('Forum.show', [
            'forum' => $forum,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('Forum.create');
    }

    public function store(Request $request)
    {

        $formFields = $request->validate([
            'title' => 'required|unique:Forums|max:20',
            'designedTo' => 'required',
            'description' => 'required|min:10',
            'tags' => 'required',
            'maxPresent' => 'required',
            'date' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();
        $formFields['owner'] = auth()->user()->name;
        Forum::create($formFields);

        return redirect('/forums/manage')->with('message', 'new Forum created successfully !');
    }
    public function edit(Forum $forum)
    {
        return view('forum.edit', [
            'forum' => $forum
        ]);
    }
    public function update(Request $request, Forum $forum)
    {
        if ($forum->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required|unique:Forums|max:20',
            'designedTo' => 'required',
            'description' => 'required|min:10',
            'tags' => 'required',
            'maxPresent' => 'required',
            'date' => 'required'
        ]);
        $forum->update($formFields);

        return redirect('/forums/manage')->with('message', 'Forum updated successfully !');
    }
    public function delete(Forum $forum)
    {
        if ($forum->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $forum->delete();
        return redirect('/forums/manage')->with('message', 'Forum deleted successfully !');
    }
    public function manage()
    {
        return  view('Forum.manage', ['forums' => auth()->user()->forums()->get()]);
    }
}
