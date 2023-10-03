<?php

namespace App\Http\Controllers;

use App\DrinkEn;
use App\DrinkTypeEn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DrinkEnController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.drink_en.index';
        $this->create = 'admin.drink_en.create';
        $this->edit = 'admin.drink_en.edit';
    }   

    public function index()
    {
        $lists = DrinkEn::all();
        return view($this->index,compact('lists'));
    }

    public function create()
    {
        $types = DrinkTypeEn::all();
        return view($this->create,compact('types'));
    }

    public function store(Request $request)
    {
        $new_record = new DrinkEn();
        $new_record -> type_id = $request->type_id;
        $new_record -> drink_name  = $request->drink_name;
        $new_record -> cold  = $request->cold;
        $new_record -> hot  = $request->hot;
        $new_record -> sort  = $request->sort;
        $new_record -> save();

        return redirect('/admin/drink_en')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $list = DrinkEn::find($id);
        $types = DrinkTypeEn::all();
        return view($this->edit,compact('list','id','types'));
    }

    public function update(Request $request,$id)
    {
        $Drink = DrinkEn::find($id);
        $Drink -> type_id = $request->type_id;
        $Drink -> drink_name  = $request->drink_name;
        $Drink -> cold  = $request->cold;
        $Drink -> hot  = $request->hot;
        $Drink -> sort  = $request->sort;
        $Drink -> save();

        return redirect('/admin/drink_en')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $Drink = DrinkEn::find($id);
        $this->delete_file($Drink->image_ur);
        $Drink->delete();
        return redirect('/admin/drink_en')->with('message','刪除成功!');
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
