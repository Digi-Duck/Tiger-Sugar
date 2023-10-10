<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Services\FileService;

class MediaController extends Controller
{

    public function __construct(protected FileService $fileService)
    {
    }

    public function index(Request $request)
    {
        $lists = Media::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;
        $page = $request->page;
        $count = $lists->count();

        if ($request->filled('keyword')) {
            $lists->where('name', 'like', "%{$keyword}%")
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
        return view('backend.media.index', compact('lists', 'keyword', 'page_numbers', 'page', 'count'));
    }

    public function create()
    {
        return view('backend.media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'video_file' => 'required',
        ]);

        $value = Media::create([
            'name' => $request->name,
            'link' => '',
            'sort' => $request->sort,
        ]);
        if ($request->hasFile('video_file')) {
            $video = $this->fileService->imgUpload($request->file('video_file'), 'media-video');
            $value->update([
                'link' => $video,
            ]);
        };

        return redirect(route('back.media.index'))->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $info = Media::find($id);
        return view('backend.media.edit', compact('info', 'id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $value = Media::find($id);
        $value->update([
            'name' => $request->name,
            'sort' => $request->sort,
        ]);

        if ($request->hasFile('video_file')) {
            $video = $this->fileService->imgUpload($request->file('video_file'), 'media-video');
            $value->update([
                'link' => $video,
            ]);
        }

        return redirect(route('back.media.index'))->with('message', '更新成功!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $Media = Media::find($id);
        $this->fileService->deleteUpload($Media->link);
        $Media->delete();

        return 'success';
    }

     //上傳檔案
    //  public function upload_video($file){
    //     $allowed_extensions =["mp4", "MP4"];
    //     if ($file->getClientOriginalExtension() &&
    //         !in_array($file->getClientOriginalExtension(), $allowed_extensions))
    //     {
    //         return redirect()->back()->with('message','僅接受.mp4格式檔案!');
    //     }
    //     $extension = $file->getClientOriginalExtension();
    //     $destinationPath = public_path() . '/media/';
    //     $original_filename = $file->getClientOriginalName();

    //     $filename = $file->getFilename() . '.' . $extension;
    //     $url = '/media/' . $filename;

    //     $file->move($destinationPath, $filename);

    //     return $url;
    // }

    // //刪除檔案
    // public function delete_file($path){
    //     File::delete(public_path().$path);
    // }

}
