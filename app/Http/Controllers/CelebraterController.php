<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Celebrater;

class CelebraterController extends Controller
{
    public function index()
    {
        return view('celebrater.index');
    }

    public function detail(Request $request)
    {
        $celebrater = new Celebrater();

        // if (isset($request->id)) {
        //     //新規登録
        //     $celebrater = new Celebrater();

        //     return view('celebrater.detail')->with([
        //         'celebrater' => $celebrater,
        //     ]);
        // } else {
        //     //編集
        //     $celebrater = Celebrater::find($request->id);
        //     return view('celebrater.detail')->with([
        //         'celebrater' => $celebrater,
        //     ]);
        // }

        return view('celebrater.detail');
    }

    public function save(Request $request)
    {




        return redirect('celebrater.list');
    }
}
