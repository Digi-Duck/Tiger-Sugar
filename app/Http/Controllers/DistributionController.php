<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Products;
use App\Models\Products as ModelsProducts;
use App\Models\Rfq;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    public function index(Request $request)
    {
        $lists = Rfq::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;
        $page = $request->page;
        $count = $lists->count();

        if ($request->filled('keyword')) {
            $lists->where('name', 'like', "%{$keyword}%")
                ->orwhere('email', 'like', "%{$keyword}%")
                ->orwhere('channel', 'like', "%{$keyword}%")
                ->orwhere('city', 'like', "%{$keyword}%")
                ->orwhere('city', 'like', "%{$keyword}%")
                ->orwhere('store_address', 'like', "%{$keyword}%")
                ->orwhere('other', 'like', "%{$keyword}%");
        }

        if ($page_numbers == null) {
            $page_numbers = 10;
        }

        if ($page == null) {
            $page = 1;
        }
        $lists->orderBy('id');
        $lists = $lists->paginate($page_numbers);
        $lists->appends(compact('lists', 'keyword', 'page_numbers'));
        return view('backend.distribution.index', compact('lists', 'keyword', 'page_numbers', 'count'));
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
        $country = Country::find($contact_info->city)->country_name;

        return view('backend.distribution.show',compact('contact_info', 'products', 'country'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $Contact = Rfq::find($id);
        $Contact->delete();
        return 'success';
    }

    public function delete_all(Request $request)
    {
        $Contact = Rfq::all();

        $Contact->each(function ($item, $key) {
            $item->delete();
        });
        return redirect('/admin/distribution')->with('message','刪除所有來信資料成功! 若為誤刪，請聯絡製作網頁廠商，可再進行資料復原。');
    }

    public function excel(Request $request)
    {
        $lists = Rfq::query();
        $lists->orderBy('id');
        $lists = $lists->get();
        return $lists;
    }
}
