<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category'))
        {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('author'))
        {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('events',[
            "title" => "All Event" . $title,
            "active" => "event",
            "events" => Event::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Event $event)
    {
        return view('event', [
            "title" => "Single Post",
            "active" => "event",
            "events" => $event
        ]);
    }
}
