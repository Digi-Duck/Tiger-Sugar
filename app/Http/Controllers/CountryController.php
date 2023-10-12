<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Shop;
use App\Models\Country;
use App\Models\Continent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\FileService;

class CountryController extends Controller
{

    public function __construct(protected FileService $fileService)
    {
    }

    public function index()
    {
        $lists = Country::withCount('shops')->get();
        return view('backend.country.index',compact('lists'));
    }

    public function create()
    {
        $continents = Continent::get();
        return view('backend.country.create',compact('continents'));
    }

    public function store(Request $request)
    {
        $country = Country::create([
            'continent_id' => $request->continent_id,
            'country_name' => $request->country_name,
            'country_en_name' => $request->country_en_name,
            'link' => $request->link,
            'fb_link' => $request->fb_link,
            'ig_link' => $request->ig_link,
            'weibo_link' => $request->weibo_link,
            'sort' => $request->sort,
        ]);

        $img = $this->fileService->imgUpload($request->file('country_photo'), 'country-img');
        $country->update([
            'country_photo' => $img,
        ]);

        return redirect(route('back.country.index'))->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $info = Country::find($id);
        $continents = Continent::get();
        return view('backend.country.edit',compact('info','id','continents'));
    }

    public function update(Request $request,$id)
    {
        $country = Country::find($id);
        $country->update([
            'continent_id' => $request->continent_id,
            'country_name' => $request->country_name,
            'country_en_name' => $request->country_en_name,
            'link' => $request->link,
            'fb_link' => $request->fb_link,
            'ig_link' => $request->ig_link,
            'weibo_link' => $request->weibo_link,
            'sort' => $request->sort,
        ]);

        if ($request->hasFile('country_photo')) {
            $img = $this->fileService->imgUpload($request->file('country_photo'), 'country-img');
            $country->update([
            'country_photo' => $img,
            ]);
        }
        return redirect(route('back.country.index'))->with('message','更新成功!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $hasCity=City::where('country_id',$id)->count();
        $country = Country::find($id);
        if(!$hasCity){
            $this->fileService->deleteUpload($country->country_photo);
            $country->delete();
            return redirect(route('back.country.index'))->with('message','刪除成功!');
        }
        else{

            return redirect(route('back.country.index'))->with('message','目前'.$country->country_name.'尚有'.$hasCity.'個城市，請先刪除相關城市');
        }
    }
}
