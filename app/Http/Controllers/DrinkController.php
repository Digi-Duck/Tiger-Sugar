<?php

namespace App\Http\Controllers;

use App\Drink;
use App\DrinkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DrinkController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.drink.index';
        $this->create = 'admin.drink.create';
        $this->edit = 'admin.drink.edit';
    }

    public function index()
    {
        $lists = Drink::all();
        return view($this->index,compact('lists'));
    }

    public function create()
    {
        $types = DrinkType::all();
        return view($this->create,compact('types'));
    }

    public function store(Request $request)
    {
        $new_record = new Drink();
        $new_record -> type_id = $request->type_id;
        $new_record -> drink_name  = $request->drink_name;
        $new_record -> cold  = $request->cold;
        $new_record -> hot  = $request->hot;
        $new_record -> sort  = $request->sort;
        $new_record -> save();

        return redirect('/admin/drink')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $list = Drink::find($id);
        $types = DrinkType::all();
        return view($this->edit,compact('list','id','types'));
    }

    public function update(Request $request,$id)
    {
        $Drink = Drink::find($id);
        $Drink -> type_id = $request->type_id;
        $Drink -> drink_name  = $request->drink_name;
        $Drink -> cold  = $request->cold;
        $Drink -> hot  = $request->hot;
        $Drink -> sort  = $request->sort;
        $Drink -> save();

        return redirect('/admin/drink')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $Drink = Drink::find($id);
        $this->delete_file($Drink->image_ur);
        $Drink->delete();
        return redirect('/admin/drink')->with('message','刪除成功!');
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
