<?php

namespace App\Http\Controllers;

use App\Franchise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FranchiseController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.franchise.index';
        $this->create = 'admin.franchise.create';
        $this->edit = 'admin.franchise.edit';
    }

    public function index()
    {
        $lists = Franchise::withCount('stores')->get();
        return view($this->index,compact('lists'));
    }

    public function create()
    {
        return view($this->create);
    }

    public function store(Request $request)
    {
        $new_record = new Franchise();
        $new_record -> country_name = $request->country_name;
        $new_record -> country_en_name = $request->country_en_name;
        $new_record -> country_number = $request->country_number;
        $new_record -> sort  = $request->sort;
        $new_record -> link  = $request->link;
        $new_record -> fb_link  = $request->fb_link;
        $new_record -> ig_link  = $request->ig_link;
        $new_record -> weibo_link  = $request->weibo_link;
        $new_record->country_photo = $this->upload_file($request->file('country_photo'));
        $new_record -> save();
        return redirect('/admin/franchise')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $info = Franchise::find($id);
        return view($this->edit,compact('info','id'));
    }

    public function update(Request $request,$id)
    {
        $social = Franchise::find($id);
        $social -> country_name = $request->country_name;
        $social -> country_en_name = $request->country_en_name;
        $social -> country_number = $request->country_number;

        if($request->hasFile('country_photo')){
            $this->delete_file($social->country_photo);
            $social->country_photo = $this->upload_file($request->file('country_photo'));
        }
        $social -> sort  = $request->sort;
        $social -> link  = $request->link;
        $social -> fb_link  = $request->fb_link;
        $social -> ig_link  = $request->ig_link;
        $social -> weibo_link  = $request->weibo_link;
        $social -> save();
        return redirect('/admin/franchise')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $social = Franchise::find($id);
        $this->delete_file($social->pc_video_url);
        $social->delete();
        return redirect('/admin/franchise')->with('message','刪除成功!');
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
