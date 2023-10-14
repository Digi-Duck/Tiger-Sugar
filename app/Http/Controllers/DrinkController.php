<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\DrinkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DrinkController extends Controller
{
    public function index(Request $request)
    {
        $lists = Drink::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;
        $page = $request->page;
        $count = $lists->count();

        if ($request->filled('keyword')) {
            $lists->where('drink_name', 'like', "%{$keyword}%")
                ->orWhere('sort', 'like', "%{$keyword}%")
                ->orWhereHas('DrinkType', function($query) use($keyword) {
                    $query->where('type_name', 'like', "%{$keyword}%");
                });
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
        return view('backend.drink.index', compact('lists', 'keyword', 'page_numbers', 'page', 'count'));
    }

    public function create()
    {
        $types = DrinkType::all();
        return view('backend.drink.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'required',
            'drink_name' => 'required|max:255',
            'sort' => 'required|max:11',
        ],[
            'type_id.required' => '類別必填',
            'type_name.required' => '飲品名稱必填',
            'type_name.max' => '類型名稱不能超過255個字',
            'sort' => '權重不能超過11個字',
        ]);

        // dd($request->all());
        Drink::create([
            'type_id' => $request->type_id,
            'drink_name' => $request->drink_name,
            'cold' => $request->cold,
            'hot' => $request->hot,
            'sort' => $request->sort,
        ]);
        return redirect(route('back.drink.index'))->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $lists = Drink::find($id);
        $types = DrinkType::all();
        return view('backend.drink.edit', compact('lists', 'id', 'types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_id' => 'required',
            'drink_name' => 'required|max:255',
            'sort' => 'required|max:11',
        ],[
            'type_id.required' => '類別必填',
            'type_name.required' => '飲品名稱必填',
            'type_name.max' => '類型名稱不能超過255個字',
            'sort' => '權重不能超過11個字',
        ]);

        $drink = Drink::find($id);
        $drink->update([
            'type_id' => $request->type_id,
            'drink_name' => $request->drink_name,
            'cold' => $request->cold,
            'hot' => $request->hot,
            'sort' => $request->sort,
        ]);
        return redirect(route('back.drink.index'))->with('message', '更新成功!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $Drink = Drink::find($id);
        $Drink->delete();
        return 'success';
    }
}
