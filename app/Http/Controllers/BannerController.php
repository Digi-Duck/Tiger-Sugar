<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class BannerController extends Controller
{

    public function index()
    {
        $lists = Banner::all();
        return view('backend.banner.index', compact('lists'));
    }

    public function create()
    {
        return view('backend.banner.create');
    }

    public function store(Request $request)
    {
        //     $new_record = new Banner();
        //     $new_record -> type = $request->type;

        //     if($request->pc_video_url !=''){
        //         $pc_video_url = $request->pc_video_url;
        //         parse_str( parse_url( $pc_video_url, PHP_URL_QUERY ), $url_para);
        //         $new_record -> pc_video_url = $url_para['v'];
        //     }

        //     if($request->mb_video_url !=''){
        //         $mb_video_url = $request->mb_video_url;
        //         parse_str( parse_url( $mb_video_url, PHP_URL_QUERY ), $url_para1);
        //         $new_record -> mb_video_url = $url_para1['v'];
        //     }

        //     $new_record -> image_alt = $request->image_alt;
        //     $new_record -> link_url = $request->link_url;
        //     $new_record -> link_target = $request->link_target;
        //     $new_record -> sort = $request->sort;
        //     if($request->hasFile('pc_image_url')){
        //         $new_record->pc_image_url = $this->upload_file($request->file('pc_image_url'));
        //     }
        //     if($request->hasFile('mb_image_url')){
        //         $new_record->mb_image_url = $this->upload_file($request->file('mb_image_url'));
        //     }

        //     $new_record -> save();
        //     return redirect('/admin/banner')->with('message','新增成功!');
        // }

        // //edit
        // public function edit($id)
        // {
        //     $info = Banner::find($id);
        //     return view('backend/banner/edit',compact('info','id'));
        // }

        // public function update(Request $request,$id)
        // {
        //     $banner= Banner::find($id);
        //     $banner -> type = $request->type;
        //     if($request->pc_video_url !=''){
        //         $pc_video_url = $request->pc_video_url;
        //         parse_str( parse_url( $pc_video_url, PHP_URL_QUERY ), $url_para);
        //         $banner -> pc_video_url = $url_para['v'];
        //     }

        //     if($request->mb_video_url !=''){
        //         $mb_video_url = $request->mb_video_url;
        //         parse_str( parse_url( $mb_video_url, PHP_URL_QUERY ), $url_para1);
        //         $banner -> mb_video_url = $url_para1['v'];
        //     }
        //     $banner -> image_alt = $request->image_alt;
        //     $banner -> link_url = $request->link_url;
        //     $banner -> link_target = $request->link_target;
        //     $banner -> sort = $request->sort;

        //     if($request->hasFile('pc_image_url')){
        //         $this->delete_file($banner->pc_image_url);
        //         $banner->pc_image_url = $this->upload_file($request->file('pc_image_url'));
        //     }
        //     if($request->hasFile('mb_image_url')){
        //         $this->delete_file($banner->mb_image_url);
        //         $banner->mb_image_url = $this->upload_file($request->file('mb_image_url'));
        //     }

        //     $banner -> save();

        $pcimg = Storage::putFile('public/upload', $request->file('pc_image_url'));
        $mbimg = Storage::putFile('public/upload', $request->file('mb_image_url'));
        Banner::create([
            'type' => $request->type,
            'pc_imgae_url' => str_replace('public', 'storage', $pcimg),
            'mb_image_url' =>str_replace('public', 'storage', $mbimg),
            'image_alt' => $request->image_alt,
            'link_url' =>$request->link_url,
            'link_target' => $request->link_target,
            'pc_video_url' =>$request->pc_video_url,
            'mb_video_url' =>$request->mb_video_url,
            'sort' =>$request->sort,
        ]);
        //產品更新功能

        return redirect(route('back.banner.index'))->with('message', '更新成功!');
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        $this->delete_file($banner->pc_video_url);
        $this->delete_file($banner->pc_video_url);
        $banner->delete();

        return redirect('/admin/banner')->with('message', '刪除成功!');
    }

    //上傳檔案
    public function upload_file($file)
    {
        $allowed_extensions = ["png", "jpg", "gif", "PNG", "JPG", "GIF", "jpeg", "JPEG"];
        if (
            $file->getClientOriginalExtension() &&
            !in_array($file->getClientOriginalExtension(), $allowed_extensions)
        ) {
            return redirect()->back()->with('message', '僅接受.jpg, .png, .gif, .jepg格式檔案!');
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
    public function delete_file($path)
    {
        File::delete(public_path() . $path);
    }
}
