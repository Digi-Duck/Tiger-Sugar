<?php

namespace App\Http\Controllers;

use App\City;
use App\Shop;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CityController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.city.index';
        $this->create = 'admin.city.create';
        $this->edit = 'admin.city.edit';
    }

    public function index()
    {
        $lists = City::withCount('shops')->get();
        return view($this->index,compact('lists'));
    }

    public function create()
    {
        $types = Country::all();
        return view($this->create,compact('types'));
    }

    public function store(Request $request)
    {
        $new_record = new City();
        $new_record ->country_id  = $request->country_id;
        $new_record ->city_name  = $request->city_name;
        $new_record ->city_name_en  = $request->city_name_en;
        if($request->hasFile('city_photo')){
            $new_record ->city_photo = $this->upload_file($request->file('city_photo'));
        }
        $new_record ->sort  = $request->sort;
        $new_record ->link  = $request->link;
        $new_record ->fb_link  = $request->fb_link;
        $new_record ->ig_link  = $request->ig_link;
        $new_record ->weibo_link  = $request->weibo_link;
        $new_record ->save();
        return redirect('/admin/city')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $types = Country::all();
        $list = City::find($id);
        return view($this->edit,compact('list','types'));
    }

    public function update(Request $request,$id)
    {
        $City = City::find($id);
        $City ->country_id  = $request->country_id;
        $City ->city_name  = $request->city_name;
        $City ->city_name_en  = $request->city_name_en;
        if($request->hasFile('city_photo')){
            $this->delete_file($City->city_photo);
            $City->city_photo = $this->upload_file($request->file('city_photo'));
        }
        $City ->sort  = $request->sort;
        $City ->link  = $request->link;
        $City ->fb_link  = $request->fb_link;
        $City ->ig_link  = $request->ig_link;
        $City ->weibo_link  = $request->weibo_link;
        $City -> save();
        return redirect('/admin/city')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $hasShop = Shop::where('city_id',$id)->count();
        $City = City::find($id);
        if(!$hasShop){
            $this->delete_file($City->city_photo);
            $City->delete();
            return redirect('/admin/city')->with('message','刪除成功!');
        }
        else{
            return redirect('/admin/city')->with('message','目前'.$City->city_name.'尚有'.$hasShop.'個店鋪，請先刪除相關店鋪');
        }
    }
    
    //上傳檔案
    public function upload_file($file){
        $allowed_extensions =["png", "jpg", "gif", "PNG", "JPG", "GIF","jpeg","JPEG"];
        if ($file->getClientOriginalExtension() &&
            !in_array($file->getClientOriginalExtension(), $allowed_extensions))
        {
            return redirect()->back()->with('message','僅接受.jpg, .png, .gif, .jepg格式檔案!');
        }
        $extension = $file->getClientOriginalExtension();
        $destinationPath = public_path() . '/summernote_upload/';
        $original_filename = $file->getClientOriginalName();

        $filename = $file->getFilename() . '.' . $extension;
        $url = '/summernote_upload/' . $filename;

        $file->move($destinationPath, $filename);

        return $url;
    }

    //刪除檔案
    public function delete_file($path){
        File::delete(public_path().$path);
    }
}
