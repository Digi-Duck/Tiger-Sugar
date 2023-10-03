<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ShopController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.shop.index';
        $this->create = 'admin.shop.create';
        $this->edit = 'admin.shop.edit';
    }

    public function index()
    {
        $lists = Shop::all();

        return view($this->index,compact('lists'));
    }

    public function create()
    {
        $countries = Country::with('city')->get();

        return view($this->create,compact('countries'));
    }

    public function store(Request $request)
    {
        $new_record = new Shop();
        $new_record ->city_id = $request->city_id;
        $city= City::where('id',$request->city_id)->first();
        $new_record ->country_id = $city->country_id;;
        $new_record ->name  = $request->shop_name;
        $new_record ->address  = $request->address;
        $new_record ->phone  = $request->phone;
        $new_record ->sort  = $request->sort;
        $new_record -> save();

        return redirect('/admin/shop')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $list = Shop::find($id);
        $countries = Country::with('city')->get();

        return view($this->edit,compact('list','id','countries'));
    }

    public function update(Request $request,$id)
    {
        $Shop = Shop::find($id);
        $Shop ->city_id = $request->city_id;
        $city= City::where('id',$request->city_id)->first();
        $Shop ->country_id = $city->country_id;;
        $Shop ->name  = $request->shop_name;
        $Shop ->address  = $request->address;
        $Shop ->phone  = $request->phone;
        $Shop ->sort  = $request->sort;
        $Shop ->save();

        return redirect('/admin/shop')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $shop = Shop::find($id);
        $shop->delete();

        return redirect('/admin/shop')->with('message','刪除成功!');
    }
}
