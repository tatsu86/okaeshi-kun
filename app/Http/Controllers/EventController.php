<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EventController extends Controller
{
    public function index()
    {
        return view('event.index');
    }

    public function detail()
    {
        return view('event.detail');
    }
}
