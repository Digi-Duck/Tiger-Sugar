<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SocialController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.social.index';
        $this->create = 'admin.social.create';
        $this->edit = 'admin.social.edit';
    }

    public function index()
    {
        $lists = Social::all();
        return view($this->index,compact('lists'));
    }

    public function create()
    {
        return view($this->create);
    }

    public function store(Request $request)
    {
        $new_record = new Social();
        //embed or social
        $new_record -> type = $request->type;
        $new_record -> sort  = $request->sort;

        //embed
        $new_record -> embed_link = $request->embed_link;
        $new_record -> embed_name = $request->embed_name;

        //social
        $new_record -> user_name = $request->user_name;
        $new_record -> user_account = $request->user_account;
        $new_record -> social_icon = $request->social_icon;
        $new_record -> social_icon_color = $request->social_icon_color;
        $new_record -> link_title = $request->link_title;
        $new_record -> link_href = $request->link_href;
        $new_record -> link_target = $request->link_target;
        $new_record -> social_info = $request->social_info;
        $new_record -> post_date = $request->post_date;


        if($request->hasFile('user_photo')){
            $new_record->user_photo = $this->upload_file($request->file('user_photo'));
        }
        if($request->hasFile('main_photo')){
            $new_record->main_photo = $this->upload_file($request->file('main_photo'));
        }

        $new_record -> save();
        return redirect('/admin/social')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $info = Social::find($id);
        return view($this->edit,compact('info','id'));
    }

    public function update(Request $request,$id)
    {
        $social = Social::find($id);
        //embed or social
        $social -> type = $request->type;
        $social -> sort  = $request->sort;

        //embed
        $social -> embed_link = $request->embed_link;
        $social -> embed_name = $request->embed_name;

        //social
        $social -> user_name = $request->user_name;
        $social -> user_account = $request->user_account;
        $social -> social_icon = $request->social_icon;
        $social -> social_icon_color = $request->social_icon_color;
        $social -> link_title = $request->link_title;
        $social -> link_href = $request->link_href;
        $social -> link_target = $request->link_target;
        $social -> social_info = $request->social_info;
        $social -> post_date = $request->post_date;

        if($request->hasFile('user_photo')){
            $this->delete_file($social->user_photo);
            $social->user_photo = $this->upload_file($request->file('user_photo'));
        }
        if($request->hasFile('main_photo')){
            $this->delete_file($social->main_photo);
            $social->main_photo = $this->upload_file($request->file('main_photo'));
        }

        $social -> save();
        return redirect('/admin/social')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $social = Social::find($id);
        $social->delete();
        return redirect('/admin/social')->with('message','刪除成功!');
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
