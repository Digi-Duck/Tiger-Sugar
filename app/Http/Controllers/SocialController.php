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
        // dump($request->user_icon);
        // dd($request->all());
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
            'link_title' => $request->link_title,
            'link_href' => $request->link_href,
            'link_target' => $request->link_target,
            'social_info' => $request->social_info,
            'post_date' => $request->post_date,
        ]);

        $type = $request->type;

        if ($type == 'custom') {
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
        return redirect(route('back.social.index'))->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $info = Social::find($id);
        return view('backend/social/edit', compact('info', 'id'));
    }

    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'embed_name' => 'required|max:255',
        //     'embed_link' => 'required',
        //     'sort' => 'required|max:11',
        // ],[
        //     'embed_name.required' => '標題必填',
        //     'embed_name.max' => '標題不能超過255個字',
        //     'embed_link.required' => '內容必填',
        //     'sort.required' => '權重必填',
        //     'sort.max' => '權重不能超過11個字',
        // ]);

        $social = Social::find($id);

        $social->update([
            'embed_name' => $request->embed_name,
            'embed_link' => $request->embed_link,
            'post_date' => $request->post_date,
            'sort' => $request->sort,
        ]);
        // $type = $request->type;

        // if ($type == '圖片') {
        //     $request->validate([
        //         'user_photo' => 'image',
        //         'main_photo' => 'image',
        //     ]);

        //     $userimg = $this->fileService->imgUpload($request->file('user_photo'), 'social-userimg');
        //     $mainimg = $this->fileService->imgUpload($request->file('main_photo'), 'social-mainimg');
        //     $social->update([
        //         'user_photo' => $userimg,
        //         'main_photo' => $mainimg,
        //     ]);
        // }

        return redirect('back/social/index')->with('message', '新增成功!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $Social = Social::find($id);
        $this->fileService->deleteUpload($Social->user_photo);
        $this->fileService->deleteUpload($Social->main_photo);
        $Social->delete();
        return 'success';
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
