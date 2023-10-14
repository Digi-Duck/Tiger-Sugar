<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\FileService;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $lists = Shop::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;
        $page = $request->page;
        $count = $lists->count();

        if ($request->filled('keyword')) {
            $lists->where('name', 'like', "%{$keyword}%")
                ->orWhere('address', 'like', "%{$keyword}%")
                ->orWhere('phone', 'like', "%{$keyword}%")
                ->orWhere('sort', 'like', "%{$keyword}%")
                ->orWhereHas('Country', function ($query) use ($keyword) {
                    $query->where('country_name', 'like', "%{$keyword}%");
                })
                ->orWhereHas('City', function ($query) use ($keyword) {
                    $query->where('city_name', 'like', "%{$keyword}%");
                }
            );
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
        return view('backend.shop.index', compact('lists', 'keyword', 'page_numbers', 'page', 'count'));



        // $lists = Shop::all();

        // return view('backend.shop.index',compact('lists'));
    }

    public function create()
    {
        $countries = Country::with('city', 'city.shops')->get();

        return view('backend.shop.create',compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'exists:cities,id',
            'shop_name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'max:255',
            'sort' => 'required|max:11',
        ],[
            'city_id.exists' => '程式不存在',
            'shop_name.required' => '店名必填',
            'shop_name.max' => '店名不能超過255個字',
            'address.required' => '地址必填',
            'address.max' => '地址不能超過255個字',
            'phone.required' => '電話必填',
            'phone.max' => '電話不能超過255個字',
            'sort' => '權重不能超過11個字',
        ]);

        $city = City::find($request->city_id);
         Shop::create([
            'city_id' => $request->city_id,
            'country_id' => $city->country_id,
            'name' => $request->shop_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'sort' => $request->sort,
        ]);
        return redirect(route('back.shop.index'))->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $list = Shop::find($id);
        $countries = Country::with('city')->get();

        return view('backend.shop.edit',compact('list','id','countries'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'city_id' => 'exists:cities,id',
            'shop_name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'max:255',
            'sort' => 'required|max:11',
        ],[
            'city_id.exists' => '程式不存在',
            'shop_name.required' => '店名必填',
            'shop_name.max' => '店名不能超過255個字',
            'address.required' => '地址必填',
            'address.max' => '地址不能超過255個字',
            'phone.required' => '電話必填',
            'phone.max' => '電話不能超過255個字',
            'sort' => '權重不能超過11個字',
        ]);

        $shop = Shop::find($id);
        $city = City::find($request->city_id);
        $shop->update([
            'city_id' => $request->city_id,
            'country_id' => $city->country_id,
            'name' => $request->shop_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'sort' => $request->sort,
        ]);
        return redirect(route('back.shop.index'))->with('message', '新增成功!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $shop = Shop::find($id);
        $shop->delete();
        return 'success';
    }
}
