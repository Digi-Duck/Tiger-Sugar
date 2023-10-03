<?php

namespace App\Http\Controllers;

use App\Area;
use App\Franchise;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StoreController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.store.index';
        $this->create = 'admin.store.create';
        $this->edit = 'admin.store.edit';
    }

    public function index()
    {
        $lists = Store::all();

        return view($this->index,compact('lists'));
    }

    public function create()
    {
        $countries = Franchise::with('area')->get();

        return view($this->create,compact('countries'));
    }

    public function store(Request $request)
    {
        $new_record = new Store();
        $new_record -> area_id = $request->area_id;
        $area= Area::where('id',$request->area_id)->first();
        $new_record -> franchise_id = $area->franchise_id;;
        $new_record -> name  = $request->store_name;
        $new_record -> address  = $request->address;
        $new_record -> phone  = $request->phone;
        $new_record -> sort  = $request->sort;
        $new_record -> save();

        return redirect('/admin/store')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $list = Store::find($id);
        $countries = Franchise::with('area')->get();

        return view($this->edit,compact('list','id','countries'));
    }

    public function update(Request $request,$id)
    {
        $Store = Store::find($id);
        $Store -> area_id = $request->area_id;
        $area= Area::where('id',$request->area_id)->first();
        $Store -> franchise_id = $area->franchise_id;;
        $Store -> name  = $request->store_name;
        $Store -> address  = $request->address;
        $Store -> phone  = $request->phone;
        $Store -> sort  = $request->sort;
        $Store -> save();

        return redirect('/admin/store')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $Drink = Store::find($id);
        $Drink->delete();

        return redirect('/admin/store')->with('message','刪除成功!');
    }
}
