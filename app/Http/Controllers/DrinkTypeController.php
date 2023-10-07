<?php

namespace App\Http\Controllers;

use App\Models\DrinkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DrinkTypeController extends Controller
{

    public function index()
    {
        $lists = DrinkType::all();
        return view('backend.drink_type.index',compact('lists'));
    }

    public function create()
    {
        return view('backend.drink_type.create');
    }

    public function store(Request $request)
    {
        $new_record = new DrinkType();
        $new_record -> type_name = $request->type_name;
        $new_record -> type_info  = $request->type_info;
        $new_record -> sort  = $request->sort;
        $new_record -> save();
        return redirect('backend.drink_type.index')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $list = DrinkType::find($id);
        return view('backend.drink_type.edit',compact('list','id'));
    }

    public function update(Request $request,$id)
    {
        $DrinkType = DrinkType::find($id);
        $DrinkType -> type_name = $request->type_name;
        $DrinkType -> type_info  = $request->type_info;
        $DrinkType -> sort  = $request->sort;
        $DrinkType -> save();

        return redirect('backend.drink_type.index')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $DrinkType = DrinkType::find($id);
        $DrinkType->delete();
        return redirect('backend.drink_type.index')->with('message','刪除成功!');
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
