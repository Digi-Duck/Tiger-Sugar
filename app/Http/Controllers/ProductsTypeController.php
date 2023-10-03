<?php

namespace App\Http\Controllers;

use App\Products;
use App\ProductsType;
use Illuminate\Http\Request;

class ProductsTypeController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.products_type.index';
        $this->create = 'admin.products_type.create';
        $this->edit = 'admin.products_type.edit';
    }

    public function index()
    {
        $lists = ProductsType::all();
        return view($this->index, compact('lists'));
    }

    public function create()
    {
        return view($this->create);
    }

    public function store(Request $request)
    {
        $new_record = new ProductsType();
        $new_record -> tw_name = $request->tw_name;
        $new_record -> en_name = $request->en_name;
        $new_record -> sort  = $request->sort;
        $new_record -> save();
        return redirect('/admin/products_type')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $list = ProductsType::find($id);
        return view($this->edit,compact('list','id'));
    }

    public function update(Request $request,$id)
    {
        $new_record = ProductsType::find($id);
        $new_record -> tw_name = $request->tw_name;
        $new_record -> en_name = $request->en_name;
        $new_record -> sort  = $request->sort;
        $new_record -> save();

        return redirect('/admin/products_type')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $DrinkType = ProductsType::find($id);
        
        $hasType = Products::where("type_id",$id)->count();
        if($hasType)
            return redirect('/admin/products_type')->with('message','目前'.$DrinkType->tw_name.'類型尚有'.$hasType.'個產品，請先刪除產品或更換產品類型');
        else{
            $DrinkType->delete();
            return redirect('/admin/products_type')->with('message','刪除成功!');
        }
        
    }
}
