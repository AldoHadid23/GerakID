<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.events.index', [
            'title' => "Event",
            'events' => Event::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.events.create', [
            'title' => "Create Event",
            'categories' => Category::all()

        ]);
    }

    /**
     * Store a newly created reskource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:events',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image'))
        {
            $validatedData['image'] = $request->file('image')->store('event-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Event::create($validatedData);

        return redirect('/dashboard/events')->with('success', 'New Event has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('dashboard.events.show', [
            'event' => $event,
            'title' => "Detail"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('dashboard.events.edit', [
            'title' => "Edit Event",
            'event' => $event,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if($request->slug != $event->slug)
        {
            $rules['slug'] = 'required|unique:events';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('event-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Event::where('id', $event->id)->update($validatedData);

        return redirect('/dashboard/events')->with('success', 'Event has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if($event->image)
        {
            Storage::delete($event->image);
        }
        Event::destroy($event->id);
        return redirect('/dashboard/events')->with('success', 'Event has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Event::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
