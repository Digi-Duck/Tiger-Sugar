<?php

namespace App\Http\Controllers;

use App\Models\DrinkTypeEn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DrinkTypeEnController extends Controller
{

    public function index(Request $request)
    {
        $lists = DrinkTypeEn::all()->sortBy('sort');
        return view('backend.drink_type_en.index',compact('lists'));
    }

    public function create()
    {
        return view('backend.drink_type_en.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required|max:255',
            'type_info' => 'max:255',
            'sort' => 'required|max:11',
        ]);

         DrinkTypeEn::create([
            'type_name' => $request->type_name,
            'type_info' => $request->type_info,
            'sort' => $request->sort,
        ]);
        return redirect(route('back.drink_type_en.index'))->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $list = DrinkTypeEn::find($id);
        return view('backend.drink_type_en.edit',compact('list','id'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'type_name' => 'required|max:255',
            'type_info' => 'max:255',
            'sort' => 'required|max:11',
        ]);
        $drink = DrinkTypeEn::find($id);
        $drink->update([
            'type_name' => $request->type_name,
            'type_info' => $request->type_info,
            'sort' => $request->sort,
        ]);
        return redirect(route('back.drink_type_en.index'))->with('message', '更新成功!');
    }

    public function delete($id)
    {
        $DrinkType = DrinkTypeEn::find($id);
        $DrinkType->delete();
        return redirect(route('back.drink_type_en.index'))->with('message','刪除成功!');
    }
}
