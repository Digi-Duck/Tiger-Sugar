<?php

namespace App\Http\Controllers;

use App\Models\DrinkEn;
use App\Models\DrinkTypeEn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DrinkEnController extends Controller
{
    public function index()
    {
        $lists = DrinkEn::all()->sortBy('sort');
        return view('backend.drink_en.index', compact('lists'));
    }

    public function create()
    {
        $types = DrinkTypeEn::all();
        return view('backend.drink_en.create', compact('types'));
    }


    public function store(Request $request)
    {
        DrinkEn::create([
            'type_id' => $request->type_id,
            'drink_name' => $request->drink_name,
            'cold' => $request->cold,
            'hot' => $request->hot,
            'sort' => $request->sort,
        ]);
        return redirect(route('back.drink_en.index'))->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $lists = DrinkEn::find($id);
        $types = DrinkTypeEn::all();
        return view('backend.drink_en.edit', compact('lists', 'id', 'types'));
    }

    public function update(Request $request,$id)
    {
        $drink = DrinkEn::find($id);
        $drink->update([
            'type_id' => $request->type_id,
            'drink_name' => $request->drink_name,
            'cold' => $request->cold,
            'hot' => $request->hot,
            'sort' => $request->sort,
        ]);
        return redirect(route('back.drink_en.index'))->with('message', '更新成功!');
    }

    public function delete($id)
    {
        $Drink = DrinkEn::find($id);
        $Drink->delete();
        return redirect(route('back.drink_en.index'))->with('message', '刪除成功!');
    }
}
