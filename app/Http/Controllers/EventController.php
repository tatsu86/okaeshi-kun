<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query();


        $events = $events->get();

        return view('event.index')->with([
            'events' => $events,
            'name' => $request->name,
        ]);



        return view('event.index');
    }

    public function detail()
    {
        return view('event.detail');
    }
}
