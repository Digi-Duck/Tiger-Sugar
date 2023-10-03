<?php

namespace App\Http\Controllers;

use App\City;
use App\Shop;
use App\Country;
use App\Continent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CountryController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.country.index';
        $this->create = 'admin.country.create';
        $this->edit = 'admin.country.edit';
    }

    public function index()
    {
        $lists = Country::withCount('shops')->get();
        return view($this->index,compact('lists'));
    }

    public function create()
    {
        $continents = Continent::get();
        return view($this->create,compact('continents'));
    }

    public function store(Request $request)
    {
        $new_record = new Country();
        $new_record ->continent_id = $request->continent_id;
        $new_record ->country_name = $request->country_name;
        $new_record ->country_en_name = $request->country_en_name;
        $new_record ->sort  = $request->sort;
        $new_record ->link  = $request->link;
        $new_record ->fb_link  = $request->fb_link;
        $new_record ->ig_link  = $request->ig_link;
        $new_record ->weibo_link  = $request->weibo_link;
        $new_record->country_photo = $this->upload_file($request->file('country_photo'));
        $new_record -> save();
        return redirect('/admin/country')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $continents = Continent::get();
        $info = Country::find($id);
        return view($this->edit,compact('info','id','continents'));
    }

    public function update(Request $request,$id)
    {
        $country = Country::find($id);
        $country ->continent_id = $request->continent_id;
        $country ->country_name = $request->country_name;
        $country ->country_en_name = $request->country_en_name;
        if($request->hasFile('country_photo')){
            $this->delete_file($country->country_photo);
            $country->country_photo = $this->upload_file($request->file('country_photo'));
        }
        $country ->sort  = $request->sort;
        $country ->link  = $request->link;
        $country ->fb_link  = $request->fb_link;
        $country ->ig_link  = $request->ig_link;
        $country ->weibo_link  = $request->weibo_link;
        $country ->save();
        return redirect('/admin/country')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $hasCity=City::where('country_id',$id)->count();
        $country = Country::find($id);
        if(!$hasCity){
            $this->delete_file($country->country_photo);
            $country->delete();
            return redirect('/admin/country')->with('message','刪除成功!');
        }
        else{

            return redirect('/admin/country')->with('message','目前'.$country->country_name.'尚有'.$hasCity.'個城市，請先刪除相關城市');
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
