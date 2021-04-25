<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CelebraterController extends Controller
{
    public function index()
    {
        return view('celebrater.index');
    }

    public function detail()
    {
        return view('celebrater.detail');
    }
}
