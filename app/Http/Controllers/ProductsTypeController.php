<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductsTypeController extends Controller
{
    public function index(Request $request)
    {
        $lists = ProductsType::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;
        $page = $request->page;
        $count = $lists->count();

        if ($request->filled('keyword')) {
            $lists->where('tw_name', 'like', "%{$keyword}%")
                ->orwhere('en_name', 'like', "%{$keyword}%")
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
        return view('backend.products_type.index', compact('lists', 'keyword', 'page_numbers', 'page', 'count'));
    }

    public function create()
    {
        return view('backend.products_type.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'sort' => 'required|max:11',
            'tw_name' => 'required|max:255',
            'en_name' => 'required|max:255',
        ],[
            'sort.required' => '權重必填',
            'sort.max' => '權重最多11個字',
            'tw_name.required' => '商品種類(中)必填',
            'tw_name.max' => '商品種類(中)最多255個字',
            'en_name.required' => '商品種類(英)必填',
            'en_name.max' => '商品種類(英)最多255個字',
        ]);

        ProductsType::create([
            'sort' => $request->sort,
            'tw_name' => $request->tw_name,
            'en_name' => $request->en_name,
        ]);

        return redirect(route('back.products_type.index'))->with('message','新增成功!');
    }

    public function edit($id)
    {
        $list = ProductsType::find($id);
        return view('backend.products_type.edit',compact('list','id'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'sort' => 'required|max:11',
            'tw_name' => 'required|max:255',
            'en_name' => 'required|max:255',
        ],[
            'sort.required' => '權重必填',
            'sort.max' => '權重最多11個字',
            'tw_name.required' => '商品種類(中)必填',
            'tw_name.max' => '商品種類(中)最多255個字',
            'en_name.required' => '商品種類(英)必填',
            'en_name.max' => '商品種類(英)最多255個字',
        ]);

        $product = ProductsType::find($id);
        $product->update([
            'sort' => $request->sort,
            'tw_name' => $request->tw_name,
            'en_name' => $request->en_name,
        ]);

        return redirect(route('back.products_type.index'))->with('message','更新成功!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $ProductsType = ProductsType::find($id);
        $hasType = Products::where('type_id',$id)->count();
        if($hasType)
            return '';
        else{
            $ProductsType->delete();
            return 'success';
        }
    }
}
