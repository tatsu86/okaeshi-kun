<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Celebrater;

class CelebraterController extends Controller
{
    public function index()
    {
        $celebraters = Celebrater::query()
            ->get();
        return view('celebrater.index')->with([
            'celebraters' => $celebraters,
        ]);
    }

    public function detail(Request $request)
    {
        // logger($request);

        if (!isset($request->id)) {
            //新規登録
            $celebrater = new Celebrater();

            logger($celebrater);

            return view('celebrater.detail')->with([
                'celebrater' => $celebrater,
            ]);
        } else {
            //編集
            $celebrater = Celebrater::find($request->id);

            return view('celebrater.detail')->with([
                'celebrater' => $celebrater,
            ]);
        }
    }

    public function save(Request $request)
    {
        logger($request);

        if (empty($request->id)) {
            //新規登録
            $celebrater = new Celebrater();

            logger($celebrater);
        } else {
            //編集
            $celebrater = Celebrater::find($request->id);
        }

        //+TODO:ログインIDをuser_idに保存する
        $celebrater->user_id = 1;
        $celebrater->name = $request->name;
        $celebrater->relationship = $request->relationship;
        $celebrater->gender = $request->gender;
        $celebrater->save();

        // //+TODO:ログインIDをuser_idに保存する
        // Celebrater::updateOrCreate(
        //     ['id' => $request->id],
        //     [
        //         'name' => $request->name,
        //         'user_id' => 1,
        //     ]
        // );

        return redirect(route('celebrater.list'));
    }

    public function delete(Request $request)
    {
        $celebrater = Celebrater::findOrFail($request->delete_id);
        $celebrater->delete();

        return redirect(route('celebrater.list'));
    }
}
