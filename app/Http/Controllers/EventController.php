<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class EventController extends Controller
{
    public function index()
    {
      
        return view('events.index', [
            'events' => Event::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(4)
        ]);
    }

    public function show(Event $event)
    {

        return view('events.show', [
            'event' => $event
        ]);
    }

    public function create()
    {
        return view('events.create');
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'website' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['owner'] = auth()->user()->name;
        $formFields['user_id'] = auth()->id();
        Event::create($formFields);

        return redirect('/')->with('message', 'new event created successfully !');
    }
    public function edit(Event $event)
    {
        return view('events.edit', [
            'event' => $event
        ]);
    }
    public function update(Request $request, Event $event)
    {
        if ($event->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'website' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $event->update($formFields);

        return back()->with('message', 'event updated successfully !');
    }
    public function delete(Event $event)
    {
        if ($event->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $event->delete();
        return redirect('/')->with('message', 'event deleted successfully !');
    }
    public function manage()
    {

        return  view('events.manage', ['events' => auth()->user()->events()->get()]);
    }
}
