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

    public function index(Request $request)
    {
        $lists = City::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;
        $page = $request->page;
        $count = $lists->count();

        if ($request->filled('keyword')) {
            $lists->where('city_name', 'like', "%{$keyword}%")
                ->orwhere('city_name_en', 'like', "%{$keyword}%")
                ->orwhere('sort', 'like', "%{$keyword}%")
                ->orWhereHas('Country', function ($query) use ($keyword) {
                    $query->where('country_name', 'like', "%{$keyword}%")
                        ->orwhere('country_en_name', 'like', "%{$keyword}%");
                });
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
        return view('backend.city.index', compact('lists', 'keyword', 'page_numbers', 'page', 'count'));


        // $lists = City::withCount('shops')->get();
        // return view('backend.city.index',compact('lists'));
    }

    public function create()
    {

        $types = Country::all();
        return view('backend.city.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'exists:countries,id',
            'city_name' => 'required|max:255',
            'city_name_en' => 'required|max:255',
            'link' => 'max:255',
            'fb_link' => 'max:255',
            'ig_link' => 'max:255',
            'weibo_link' => 'max:255',
            'sort' => 'required|max:11',
            'city_photo'=> 'required|image',
        ],[
            'country_id.exists' => '國家不存在',
            'city_name.required' => '城市名稱必填',
            'city_name.max' => '城市名稱不能超過255個字',
            'city_name_en.required' => '城市名稱（英）必填',
            'city_name_en.max' => '城市名稱（英）不能超過255個字',
            'link' => '官方網站連結字數不能超過255個字',
            'fb_link' => 'fb連結字數不能超過255個字',
            'ig_link' => 'ig連結字數不能超過255個字',
            'weibo_link' => '微博連結字數不能超過255個字',
            'sort' => '權重不能超過11個字',
            'city_photo' => '上傳圖片必填',
        ]);

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
        return view('backend.city.edit', compact('list', 'types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'country_id' => 'exists:countries,id',
            'city_name' => 'required|max:255',
            'city_name_en' => 'required|max:255',
            'link' => 'max:255',
            'fb_link' => 'max:255',
            'ig_link' => 'max:255',
            'weibo_link' => 'max:255',
            'sort' => 'required|max:11',
            'city_photo'=> 'image',
        ],[
            'country_id.exists' => '國家不存在',
            'city_name.required' => '城市名稱必填',
            'city_name.max' => '城市名稱不能超過255個字',
            'city_name_en.required' => '城市名稱（英）必填',
            'city_name_en.max' => '城市名稱（英）不能超過255個字',
            'link' => '官方網站連結字數不能超過255個字',
            'fb_link' => 'fb連結字數不能超過255個字',
            'ig_link' => 'ig連結字數不能超過255個字',
            'weibo_link' => '微博連結字數不能超過255個字',
            'sort' => '權重不能超過11個字',
            'city_photo' => '上傳圖片必填',
        ]);
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
        return redirect(route('back.city.index'))->with('message', '更新成功!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $City = City::find($id);

        $hasType = Shop::where('city_id', $id)->count();
        if ($hasType)
            return '';
        else {
            $this->fileService->deleteUpload($City->city_photo);
            $City->delete();
            return 'success';
        }
    }
}
