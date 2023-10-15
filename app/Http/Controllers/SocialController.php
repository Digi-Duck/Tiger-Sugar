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
        $request->validate([
            'sort' => 'required|max:11',
        ],[
            'sort.required' => '權重必填',
            'sort.max' => '權重不能超過11個字',
        ]);

        if ($request->type === 'embed'){
            $request->validate([
                'embed_name' => 'required|max:255',
                'embed_link' => 'required',
            ],[
                'embed_name.required' => '社群回饋代稱必填',
                'embed_name.max' => '社群回饋代稱不能超過255個字',
                'embed_link.required' => '嵌入碼必填',
                'sort.required' => '權重必填',
                'sort.max' => '權重不能超過11個字',
            ]);
        };

        if ($request->type === 'custom') {
            $request->session()->flash('type', 'custom_create');
            $request->validate([
                'user_photo' => 'required|image',
                'main_photo' => 'required|image',
                'user_name' => 'required',
                'link_href' => 'url',
                'social_info' => 'required|max:255',
                'post_date' => 'required',
            ],[
                'user_photo.required' => '使用者Icon必填',
                'user_photo.image' => '使用者Icon欄位必須為圖片格式',
                'main_photo.required' => '主要圖片必填',
                'main_photo.image' => '主要圖片欄位必須為圖片格式',
                'user_name.required' => '使用者名稱必填',
                'link_href.url' => '超連結網址欄為必須為網址',
                'social_info.required' => '內容必填',
                'social_info.max' => '內容最多只能輸入255個字',
                'post_date.required' => '發布日期必填',
            ]);
        };

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
        if ($request->type == 'embed') {
        }elseif ($request->type == 'custom') {
        }

        $social = Social::find($id);

        $request->validate([
            'sort' => 'required|max:11',
        ],[
            'sort.required' => '權重必填',
            'sort.max' => '權重不能超過11個字',
        ]);

        $social->update([
            'sort' => $request->sort,
        ]);

        if ($request->type === 'embed'){
            $request->session()->flash('type', 'embed_edit');
            $request->validate([
                'embed_name' => 'required|max:255',
                'embed_link' => 'required',
            ],[
                'embed_name.required' => '社群回饋代稱必填',
                'embed_name.max' => '社群回饋代稱不能超過255個字',
                'embed_link.required' => '嵌入碼必填',
                'sort.required' => '權重必填',
                'sort.max' => '權重不能超過11個字',
            ]);
            $social->update([
                'embed_name' => $request->embed_name,
                'embed_link' => $request->embed_link,
            ]);
        };

        if ($request->type === 'custom') {
            $request->session()->flash('type', 'custom_edit');
            $request->validate([
                'user_photo' => 'image',
                'main_photo' => 'image',
                'user_name' => 'required',
                'link_href' => 'url',
                'social_info' => 'required|max:255',
                'post_date' => 'required',
            ],[
                'user_photo.image' => '使用者Icon欄位必須為圖片格式',
                'main_photo.image' => '主要圖片欄位必須為圖片格式',
                'user_name.required' => '使用者名稱必填',
                'link_href.url' => '超連結網址欄為必須為網址',
                'social_info.required' => '內容必填',
                'social_info.max' => '內容最多只能輸入255個字',
                'post_date.required' => '發布日期必填',
            ]);
            $social->update([
                'user_name' => $request->user_name,
                'link_href' => $request->link_href,
                'social_info' => $request->social_info,
                'post_date' => $request->post_date,
            ]);

            if ($request->user_photo) {
                $userimg = $this->fileService->imgUpload($request->file('user_photo'), 'social-userimg');
                $social->update([
                    'user_photo' => $userimg,
                ]);
            };

            if ($request->main_photo) {
                $mainimg = $this->fileService->imgUpload($request->file('main_photo'), 'social-mainimg');
                $social->update([
                    'main_photo' => $mainimg,
                ]);
            };
        }
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
}
