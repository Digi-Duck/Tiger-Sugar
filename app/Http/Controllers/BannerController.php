<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Services\FileService;

use function PHPSTORM_META\type;

class BannerController extends Controller
{

    public function __construct(protected FileService $fileService)
    {
    }


    public function index()
    {
        $lists = Banner::all();
        return view('backend.banner.index', compact('lists'));
    }

    public function create()
    {
        return view('backend.banner.create');
    }

    //store
    public function store(Request $request)
    {
        // $new_record = Banner::create([
        //     'type'=>$request->type,
        // ]);
        $banner = Banner::create([
            'type' => $request->type,
            // 'pc_image_url' => $pcimg,
            // 'mb_imgage_url' => $mbimg,
            'image_alt' => $request->image_alt,
            'link_url' => $request->link_url,
            'link_target' => $request->link_target,
            // 'pc_video_url' => $request->pc_video_url,
            // 'mb_video_url' => $request->mb_video_url,
            'sort' => $request->sort,
        ]);

        // $new_record = new Banner();
        // $new_record->type = $request->type;

        $type = $request->type;

        if ($type == '圖片') {
            $request->validate([
                'pc_image_url' => 'image',
                'mb_image_url' => 'image',
            ]);

            $pcimg = $this->fileService->imgUpload($request->file('pc_image_url'), 'banner-pcimg');
            $mbimg = $this->fileService->imgUpload($request->file('mb_image_url'), 'banner-mbimg');
            $banner->update([
                'pc_image_url' => $pcimg,
                'mb_imgage_url' => $mbimg,
            ]);
        }


        if ($type == '影片') {
            $request->validate([
                'pc_video_url' => 'url',
                'mb_video_url' => 'url',
            ]);
            // PC
            $pc_video_url = $request->pc_video_url;
            parse_str(parse_url($pc_video_url, PHP_URL_QUERY), $url_para);
            // MB
            $mb_video_url = $request->mb_video_url;
            parse_str(parse_url($mb_video_url, PHP_URL_QUERY), $url_para1);

            $banner->update([
                'pc_video_url' => $url_para['v'],
                'mb_video_url' => $url_para1['v'],
            ]);
        }



        // $new_record->type = $request->type;

        // if ($request->pc_video_url != '') {
        //     $pc_video_url = $request->pc_video_url;
        //     parse_str(parse_url($pc_video_url, PHP_URL_QUERY), $url_para);
        //     $new_record->pc_video_url = $url_para['v'];
        // }

        // if ($request->mb_video_url != '') {
        //     $mb_video_url = $request->mb_video_url;
        //     parse_str(parse_url($mb_video_url, PHP_URL_QUERY), $url_para1);
        //     $new_record->mb_video_url = $url_para1['v'];
        // }

        // $pcimg = $this->fileService->imgUpload($request->file('pc_image_url'), 'banner-pcimg');
        // $mbimg = $this->fileService->imgUpload($request->file('mb_image_url'), 'banner-mbimg');


        // dd($request->all());
        return redirect(route('back.banner.index'))->with('message', '新增成功!');
    }

    //edit
    public function edit($id)
    {
        $info = Banner::find($id);
        return view('backend.banner.edit', compact('info', 'id'));
    }

    //update
    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        $banner->update([
            'type' => $request->type,
            'image_alt' => $request->image_alt,
            'link_url' => $request->link_url,
            'link_target' => $request->link_target,
            'sort' => $request->sort,
        ]);

        $type = $request->type;

        if ($type == '圖片') {
            $request->validate([
                'pc_image_url' => 'image',
                'mb_image_url' => 'image',
            ]);
            $pcimg = $this->fileService->imgUpload($request->file('pc_image_url'), 'banner-pcimg');
            $mbimg = $this->fileService->imgUpload($request->file('mb_image_url'), 'banner-mbimg');
            $banner->update([
                'pc_image_url' => $pcimg,
                'mb_imgage_url' => $mbimg,
            ]);
        }

        if ($type == '影片') {
            $request->validate([
                'pc_video_url' => 'url',
                'mb_video_url' => 'url',
            ]);
            // PC
            $pc_video_url = $request->pc_video_url;
            parse_str(parse_url($pc_video_url, PHP_URL_QUERY), $url_para);
            // MB
            $mb_video_url = $request->mb_video_url;
            parse_str(parse_url($mb_video_url, PHP_URL_QUERY), $url_para1);

            $banner->update([
                'pc_video_url' => $url_para['v'],
                'mb_video_url' => $url_para1['v'],
            ]);
        }




        // if ($request->file('pc_image_url','mb_image_url')) {
        //     $pcimg = $this->fileService->imgUpload($request->file('pc_image_url'), 'banner-pcimg');
        //     $mbimg = $this->fileService->imgUpload($request->file('mb_image_url'), 'banner-mbimg');
        //     $this->fileService->deleteUpload($request->file('pc_image_url'), 'banner-pcimg');
        //     $this->fileService->deleteUpload($request->file('mb_image_url'), 'banner-mbimg');
        //     $banner->update([
        //         'type' => $request->type,
        //         'pc_image_url' => $pcimg,
        //         'mb_imgage_url' => $mbimg,
        //         'image_alt' => $request->image_alt,
        //         'link_url' => $request->link_url,
        //         'link_target' => $request->link_target,
        //         'pc_video_url' => $request->pc_video_url,
        //         'mb_video_url' => $request->mb_video_url,
        //         'sort' => $request->sort,
        //     ]);
        // } else {
        //     $banner->update([
        //         'type' => $request->type,
        //         'image_alt' => $request->image_alt,
        //         'link_url' => $request->link_url,
        //         'link_target' => $request->link_target,
        //         'pc_video_url' => $request->pc_video_url,
        //         'mb_video_url' => $request->mb_video_url,
        //         'sort' => $request->sort,
        //     ]);
        // }


        // if($request->pc_video_url !=''){
        //     $pc_video_url = $request->pc_video_url;
        //     parse_str( parse_url( $pc_video_url, PHP_URL_QUERY ), $url_para);
        //     $banner -> pc_video_url = $url_para['v'];
        // }

        // if($request->mb_video_url !=''){
        //     $mb_video_url = $request->mb_video_url;
        //     parse_str( parse_url( $mb_video_url, PHP_URL_QUERY ), $url_para1);
        //     $banner -> mb_video_url = $url_para1['v'];
        // }
        // $banner -> image_alt = $request->image_alt;
        // $banner -> link_url = $request->link_url;
        // $banner -> link_target = $request->link_target;
        // $banner -> sort = $request->sort;

        // if($request->hasFile('pc_image_url')){
        //     $this->delete_file($banner->pc_image_url);
        //     $banner->pc_image_url = $this->upload_file($request->file('pc_image_url'));
        // }
        // if($request->hasFile('mb_image_url')){
        //     $this->delete_file($banner->mb_image_url);
        //     $banner->mb_image_url = $this->upload_file($request->file('mb_image_url'));
        // }

        // $banner -> save();

        return redirect(route('back.banner.index'))->with('message', '更新成功!');
    }

    //delete
    public function delete(Request $request,$id)
    {
        $banner = Banner::find($id);
        $this->fileService->deleteUpload($banner->pc_image_url);
        $this->fileService->deleteUpload($banner->mb_image_url);
        $banner->delete();
        // dd($id);
        return redirect(route('back.banner.index'))->with('message', '刪除成功!');
    }


    // public function upload_file($file){
    //     $allowed_extensions =["png", "jpg", "gif", "PNG", "JPG", "GIF","jpeg","JPEG"];
    //     if ($file->getClientOriginalExtension() &&
    //         !in_array($file->getClientOriginalExtension(), $allowed_extensions))
    //     {
    //         return redirect()->back()->with('message','僅接受.jpg, .png, .gif, .jepg格式檔案!');
    //     }
    //     $extension = $file->getClientOriginalExtension();
    //     $destinationPath = public_path() . '/summernote_upload/';
    //     $original_filename = $file->getClientOriginalName();
    //     $filename = $file->getFilename() . '.' . $extension;
    //     $url = '/summernote_upload/' . $filename;

    //     $file->move($destinationPath, $filename);
    //     return $url;
    // }

}
