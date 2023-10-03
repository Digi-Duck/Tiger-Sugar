<?php

namespace App\Http\Controllers;

use App\Rfq;
use App\Products;
use App\Franchise;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    public function index()
    {
        $lists = Rfq::all();
        return view('admin.distribution.index',compact('lists'));
    }

    public function show($id)
    {
        // 信件資訊
        $contact_info = Rfq::find($id);

        // 處理產品名稱陣列
        $product_array = (array)json_decode($contact_info->products_id);
        $products = [];

        foreach($product_array as $product){
            $product_name = Products::find($product);
            array_push($products,$product_name->title_zh);
        }

        // 經銷國家
        $country = Franchise::find($contact_info->city)->country_name;

        return view('admin.distribution.show',compact('contact_info', 'products', 'country'));
    }

    public function delete($id)
    {
        $Contact = Rfq::find($id);
        $Contact->delete();

        return redirect('/admin/distribution')->with('message','刪除成功!');
    }

    public function delete_all(Request $request)
    {
        $Contact = Rfq::all();

        $Contact->each(function ($item, $key) {
            $item->delete();
        });
        return redirect('/admin/distribution')->with('message','刪除所有來信資料成功! 若為誤刪，請聯絡製作網頁廠商，可再進行資料復原。');
    }
}
