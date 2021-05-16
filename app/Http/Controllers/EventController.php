<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Auth;
use Toastr;

class EventController extends Controller
{
    public function index(Request $request)
    {

        $event = Event::find(1);
        logger($event->celebraters);

        $events = Event::query();

        if (!empty($request->name)) {
            $events->where('name', 'like', "%{$request->name}%");
        }

        $events = $events->get();

        return view('event.index')->with([
            'events' => $events,
            'name' => $request->name,
        ]);

        return view('event.index');
    }

    public function detail(Request $request)
    {
        if (!isset($request->id)) {
            //新規登録
            $event = new Event();

            return view('event.detail')->with([
                'event' => $event,
            ]);
        } else {
            //編集
            $event = Event::find($request->id);

            return view('event.detail')->with([
                'event' => $event,
            ]);
        }
    }

    public function save(Request $request)
    {
        if (empty($request->id)) {
            //新規登録
            $event = new Event();
            $event->user_id = Auth::id();
        } else {
            //編集
            $event = Event::findOrFail($request->id);
        }

        $event->name = $request->name;
        $event->detail = $request->detail;

        $event->save();
        Toastr::success('Eventを保存しました', '', ["positionClass" => "toast-top-center", "closeButton" => true]);

        return redirect(route('event.list'))->withInput();
    }

    public function delete(Request $request)
    {
        $event = Event::findOrFail($request->delete_id);
        $event->delete();
        Toastr::warning('Eventを削除しました', '', ["positionClass" => "toast-top-center", "closeButton" => true]);

        return redirect(route('event.list'));
    }
}
