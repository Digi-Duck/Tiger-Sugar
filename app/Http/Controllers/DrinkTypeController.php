<?php

namespace App\Http\Controllers;

use App\Models\DrinkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DrinkTypeController extends Controller
{

    public function index(Request $request)
    {
        $lists = DrinkType::all()->sortBy('sort');
        return view('backend.drink_type.index', compact('lists'));
    }

    public function create()
    {
        return view('backend.drink_type.create');
    }

    public function store(Request $request)
    {
        $DrinkType = DrinkType::create([
            'type_name' => $request->type_name,
            'type_info' => $request->type_info,
            'sort' => $request->sort,
        ]);
        return redirect(route('back.drink_type.index'))->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $info = DrinkType::find($id);
        return view('backend.drink_type.edit', compact('info', 'id'));
    }

    public function update(Request $request, $id)
    {
        $DrinkType = DrinkType::find($id);
        $DrinkType::create([
            'type_name' => $request->type_name,
            'type_info' => $request->type_info,
            'sort' => $request->sort,
        ]);
        return redirect(route('back.drink_type.index'))->with('message', '更新成功!');
    }

    public function delete($id)
    {
        $DrinkType = DrinkType::find($id);
        $DrinkType->delete();
        return redirect(route('back.drink_type.index'))->with('message', '刪除成功!');
    }
}
