<?php

namespace App\Http\Controllers;

use App\Models\DrinkTypeEn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DrinkTypeEnController extends Controller
{

    public function index(Request $request)
    {
        $lists = DrinkTypeEn::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;
        $page = $request->page;
        $count = $lists->count();

        if ($request->filled('keyword')) {
            $lists->where('type_name', 'like', "%{$keyword}%")
                ->orwhere('sort', 'like', "%{$keyword}%");
        }

        if ($page_numbers == null) {
            $page_numbers = 10;
        }

        if ($page == null) {
            $page = 1;
        }
        $lists->orderBy('sort', 'asc');
        $lists = $lists->paginate($page_numbers);
        $lists->appends(compact('lists', 'keyword', 'page_numbers'));
        return view('backend.drink_type_en.index', compact('lists', 'keyword', 'page_numbers', 'page', 'count'));
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
        return view('backend.drink_type_en.edit', compact('list', 'id'));
    }

    public function update(Request $request, $id)
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

    public function delete(Request $request)
    {
        $id = $request->id;
        $DrinkTypeEn = DrinkTypeEn::find($id);
        $DrinkTypeEn->delete();
        return 'success';
    }
}
