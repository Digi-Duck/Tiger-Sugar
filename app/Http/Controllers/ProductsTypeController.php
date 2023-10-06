<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsType;
use Illuminate\Http\Request;

class ProductsTypeController extends Controller
{
    // function __construct()
    // {
    //     $this->redirect = '/admin';
    //     $this->index = 'admin.products_type.index';
    //     $this->create = 'admin.products_type.create';
    //     $this->edit = 'admin.products_type.edit';
    // }

    public function index()
    {
        $lists = ProductsType::all();
        return view('backend.products_type.index', compact('lists'));
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
        ]);

        $product = ProductsType::find($id);
        $product->update([
            'sort' => $request->sort,
            'tw_name' => $request->tw_name,
            'en_name' => $request->en_name,
        ]);

        return redirect(route('back.products_type.index'))->with('message','更新成功!');
    }

    public function delete($id)
    {
        $DrinkType = ProductsType::find($id);

        $hasType = Products::where('type_id',$id)->count();
        if($hasType)
            return redirect(route('back.products_type.index'))->with('message','目前'.$DrinkType->tw_name.'類型尚有'.$hasType.'個產品，請先刪除產品或更換產品類型');
        else{
            $DrinkType->delete();
            return redirect(route('back.products_type.index'))->with('message','刪除成功!');
        }

    }
}
