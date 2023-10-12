<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Shop;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\FileService;

class CityController extends Controller
{
    public function __construct(protected FileService $fileService)
    {
    }

    public function index()
    {
        $lists = City::withCount('shops')->get();
        return view('backend.city.index',compact('lists'));
    }

    public function create()
    {
        $types = Country::all();
        return view('backend.city.create',compact('types'));
    }

    public function store(Request $request)
    {
        $city = City::create([
            'country_id' => $request->country_id,
            'city_name' => $request->city_name,
            'city_name_en' => $request->city_name_en,
            'link' => $request->link,
            'fb_link' => $request->fb_link,
            'ig_link' => $request->ig_link,
            'weibo_link' => $request->weibo_link,
            'sort' => $request->sort,
        ]);

        $img = $this->fileService->imgUpload($request->file('city_photo'), 'city-img');
        $city->update([
            'city_photo' => $img,
        ]);

        return redirect(route('back.city.index'))->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $types = Country::all();
        $list = City::find($id);
        return view('backend.city.edit',compact('list','types'));
    }

    public function update(Request $request,$id)
    {
        $city = City::find($id);
        $city->update([
            'country_id' => $request->country_id,
            'city_name' => $request->city_name,
            'city_name_en' => $request->city_name_en,
            'link' => $request->link,
            'fb_link' => $request->fb_link,
            'ig_link' => $request->ig_link,
            'weibo_link' => $request->weibo_link,
            'sort' => $request->sort,
        ]);

        if ($request->hasFile('city_photo')) {
            $img = $this->fileService->imgUpload($request->file('city_photo'), 'city-img');
            $city->update([
            'city_photo' => $img,
            ]);
        }
        return redirect(route('back.city.index'))->with('message','更新成功!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $hasShop = Shop::where('city_id',$id)->count();
        $City = City::find($id);
        if(!$hasShop){
            $this->fileService->deleteUpload($City->city_photo);
            $City->delete();
            return redirect(route('back.city.index'))->with('message','刪除成功!');
        }
        else{
            return redirect(route('back.city.index'))->with('message','目前'.$City->city_name.'尚有'.$hasShop.'個店鋪，請先刪除相關店鋪');
        }
    }
}
