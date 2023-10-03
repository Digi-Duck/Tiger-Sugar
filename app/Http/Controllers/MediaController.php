<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.media.index';
        $this->create = 'admin.media.create';
        $this->edit = 'admin.media.edit';
    }
    public function index(){
        $mediaes = Media::orderBy('sort','desc')->get();
        return view('admin.media.index',compact('mediaes'));
    }

    public function create()
    {
        return view($this->create);
    }

    public function store(Request $request)
    {
        $new_record = new Media();
        $new_record -> name = $request->name;
        if($request->hasFile('video_file')){
            $new_record-> link = $this->upload_video($request->file('video_file'));
        }
        $new_record -> sort = $request->sort;
        $new_record -> save();
        return redirect('/admin/media')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $info = Media::find($id);
        return view($this->edit,compact('info','id'));
    }

    public function update(Request $request,$id)
    {
        $media = Media::find($id);
        $media -> name = $request->name;
        if($request->hasFile('video_file')){
            $this->delete_file($media-> link);
            $media-> link = $this->upload_video($request->file('video_file'));
        }
        $media -> sort = $request->sort;
        $media -> save();

        return redirect('/admin/media')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $media = Media::find($id);
        $this->delete_file($media->link);
        $this->delete_file($media->link);
        $media->delete();

        return redirect('/admin/media')->with('message','刪除成功!');
    }

     //上傳檔案
     public function upload_video($file){
        $allowed_extensions =["mp4", "MP4"];
        if ($file->getClientOriginalExtension() &&
            !in_array($file->getClientOriginalExtension(), $allowed_extensions))
        {
            return redirect()->back()->with('message','僅接受.mp4格式檔案!');
        }
        $extension = $file->getClientOriginalExtension();
        $destinationPath = public_path() . '/media/';
        $original_filename = $file->getClientOriginalName();

        $filename = $file->getFilename() . '.' . $extension;
        $url = '/media/' . $filename;

        $file->move($destinationPath, $filename);

        return $url;
    }

    //刪除檔案
    public function delete_file($path){
        File::delete(public_path().$path);
    }

}
