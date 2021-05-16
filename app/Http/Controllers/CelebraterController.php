<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Celebrater;
use App\Http\Requests\CelebraterRequest;
use Auth;

class CelebraterController extends Controller
{
    public function index(Request $request)
    {
        $celebraters = Celebrater::query();

        if (!empty($request->name)) {
            $celebraters->where('name', 'like', "%{$request->name}%");
        }

        //+TODO:検索項目を追加する


        $celebraters = $celebraters->get();

        return view('celebrater.index')->with([
            'celebraters' => $celebraters,
            'name' => $request->name,
            // 'gender' => $request->gender,
        ]);
    }

    public function detail(Request $request)
    {
        if (!isset($request->id)) {
            //新規登録
            $celebrater = new Celebrater();

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

    public function save(CelebraterRequest $request)
    {
        if (empty($request->id)) {
            //新規登録
            $celebrater = new Celebrater();
            $celebrater->user_id = Auth::id();
        } else {
            //編集
            $celebrater = Celebrater::findOrFail($request->id);
        }

        $celebrater->name = $request->name;
        $celebrater->relationship = $request->relationship;
        $celebrater->gender = $request->gender;
        $celebrater->postal_code1 = $request->postal_code1;
        $celebrater->postal_code2 = $request->postal_code2;
        $celebrater->address = $request->address;
        $celebrater->tel = $request->tel;
        $celebrater->email = $request->email;
        $celebrater->memo = $request->memo;

        $celebrater->save();

        return redirect(route('celebrater.list'))->withInput();
    }

    public function delete(Request $request)
    {
        $celebrater = Celebrater::findOrFail($request->delete_id);
        $celebrater->delete();

        return redirect(route('celebrater.list'));
    }
}
