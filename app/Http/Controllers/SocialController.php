<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\FileService;

class SocialController extends Controller
{
    public function __construct(protected FileService $fileService)
    {
    }

    // public function index()
    // {
    //     $lists = Social::all();
    //     return view('backend.social.index', compact('lists'));
    // }

    public function index(Request $request)
    {
        $lists = Social::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;
        $page = $request->page;
        $count = $lists->count();

        if ($request->filled('keyword')) {
            $lists->where('embed_name', 'like', "%{$keyword}%")
                ->orwhere('user_name', 'like', "%{$keyword}%")
                ->orwhere('sort', 'like', "%{$keyword}%");
        }

        if ($page_numbers == null) {
            $page_numbers = 10;
        }

        if ($page == null) {
            $page = 1;
        }
        $lists->orderBy('sort', 'asc');
        $lists = $lists->paginate($page_numbers);
        $lists->appends(compact('lists', 'keyword', 'page_numbers'));
        return view('backend.social.index', compact('lists', 'keyword', 'page_numbers', 'page', 'count'));
    }

    public function create()
    {
        return view('backend.social.create');
    }

    public function store(Request $request)
    {

        $social = Social::create([
            'type' => $request->type,
            'sort' => $request->sort,
            'embed_name' => $request->embed_name,
            'embed_link' => $request->embed_link,
            'user_icon' => $request->user_icon,
            'user_name' => $request->user_name,
            'user_account' => $request->user_account,
            'social_icon' => $request->social_icon,
            'social_icon_color' => $request->social_icon_color,
            'link-title' => $request->link_title,
            'link-href' => $request->link_href,
            'link-target' => $request->link_target,
            'social_info' => $request->social_info,
            'post_date' => $request->post_date,
        ]);


        $type = $request->type;

        if ($type == '圖片') {
            $request->validate([
                'user_photo' => 'image',
                'main_photo' => 'image',
            ]);

            $userimg = $this->fileService->imgUpload($request->file('user_photo'), 'social-userimg');
            $mainimg = $this->fileService->imgUpload($request->file('main_photo'), 'social-mainimg');
            $social->update([
                'user_photo' => $userimg,
                'main_photo' => $mainimg,
            ]);
        }

        return redirect('back/social/index')->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $info = Social::find($id);
        return view('back/social/edit', compact('info', 'id'));
    }

    public function update(Request $request, $id)
    {
        $social = Social::find($id)([
            'type' => $request->type,
            'sort' => $request->sort,
            'embed_name' => $request->embed_name,
            'embed_link' => $request->embed_link,
            'user_icon' => $request->user_icon,
            'user_name' => $request->user_name,
            'user_account' => $request->user_account,
            'social_icon' => $request->social_icon,
            'social_icon_color' => $request->social_icon_color,
            'link-title' => $request->link_title,
            'link-href' => $request->link_href,
            'link-target' => $request->link_target,
            'social_info' => $request->social_info,
            'post_date' => $request->post_date,
        ]);

        $type = $request->type;

        if ($type == '圖片') {
            $request->validate([
                'user_photo' => 'image',
                'main_photo' => 'image',
            ]);

            $userimg = $this->fileService->imgUpload($request->file('user_photo'), 'social-userimg');
            $mainimg = $this->fileService->imgUpload($request->file('main_photo'), 'social-mainimg');
            $social->update([
                'user_photo' => $userimg,
                'main_photo' => $mainimg,
            ]);
        }

        return redirect('back/social/index')->with('message', '新增成功!');
    }

    public function delete(Request $request, $id)
    {
        $social = Social::find($id);

        // Assuming that the deleteUpload method deletes the file
        $this->fileService->deleteUpload($social->user_photo);
        $this->fileService->deleteUpload($social->main_photo);

        $social->delete();

        return redirect('/back/social/index')->with('message', '刪除成功!');
    }

    //上傳檔案
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
