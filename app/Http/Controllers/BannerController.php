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


    public function index(Request $request)
    {
        $lists = Banner::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;

        if ($request->filled('keyword')) {
            $lists->where('image_alt', 'like', "%{$keyword}%");
        }
        $lists->orderBy('sort', 'asc');
        $lists = $lists->paginate($page_numbers);
        $lists->appends(compact('lists', 'keyword', 'page_numbers'));
        return view('backend.banner.index', compact('lists', 'keyword', 'page_numbers'));
    }

    public function create()
    {
        return view('backend.banner.create');
    }

    public function store(Request $request)
    {
        $banner = Banner::create([
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
                'mb_image_url' => $mbimg,
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
                'pc_video_url' => $pc_video_url,
                'mb_video_url' => $mb_video_url,
            ]);
        }
        return redirect(route('back.banner.index'))->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $info = Banner::find($id);
        return view('backend.banner.edit', compact('info', 'id'));
    }

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
                'pc_video_url' => $pc_video_url,
                'mb_video_url' => $mb_video_url,
            ]);
        }

        return redirect(route('back.banner.index'))->with('message', '更新成功!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $Banner = Banner::find($id);
        $this->fileService->deleteUpload($Banner->pc_image_url);
        $this->fileService->deleteUpload($Banner->mb_image_url);
        $Banner->delete();
        return 'success';
    }
}
