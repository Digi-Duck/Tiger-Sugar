<?php

namespace App\Http\Controllers;

use App\Models\BlogNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\FileService;

class BlogNewsController extends Controller
{

    public function __construct(protected FileService $fileService)
    {
    }

    public function index(Request $request)
    {
        $lists = BlogNews::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;
        $page = $request->page;
        $count = $lists->count();

        if ($request->filled('keyword')) {
            $lists->where('author', 'like', "%{$keyword}%")
                ->orwhere('title', 'like', "%{$keyword}%")
                ->orwhere('info', 'like', "%{$keyword}%")
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
        return view('backend.blog_news.index', compact('lists', 'keyword', 'page_numbers', 'page', 'count'));
    }

    // public function index()
    // {
    //     $lists = BlogNews::all();
    //     return view('backend.blog_news.index',compact('lists'));
    // }

    public function create()
    {
        return view('backend.blog_news.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'author' => 'required|max:255',
            'link' => 'required|max:255',
            'title' => 'required|max:255',
            'main_photo' => 'required',
            'sort' => 'required',
        ]);

        $BlogNews = BlogNews::create([
            'author' => $request->author,
            'link' => $request->link,
            'title' => $request->title,
            'info' => $request->info,
            'main_photo' => '',
            'date' => '2023-10-07',
            'sort' => $request->sort,
        ]);
        $img = $this->fileService->imgUpload($request->file('main_photo'), 'blog_news');
        $BlogNews->update([
            'main_photo' => $img,
        ]);
        return redirect(route('back.blog_news.index'))->with('message','新增成功!');
    }

    public function edit($id)
    {
        $list = BlogNews::find($id);
        return view('backend.blog_news.edit',compact('list'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'author' => 'required|max:255',
            'link' => 'required|max:255',
            'title' => 'required|max:255',
            'main_photo' => 'required',
            'sort' => 'required',
        ]);
        $BlogNews = BlogNews::find($id);
        $BlogNews->update([
            'author' => $request->author,
            'link' => $request->link,
            'title' => $request->title,
            'info' => $request->info,
            'sort' => $request->sort,
        ]);

        if($request->hasFile('main_photo')){
            $img = $this->fileService->imgUpload($request->file('main_photo'), 'blog_news');
            $BlogNews->update([
                'main_photo' => $img,
            ]);
        }

        return redirect(route('back.blog_news.index'))->with('message','更新成功!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $BlogNews = BlogNews::find($id);
        $this->fileService->deleteUpload($BlogNews->main_photo);
        $BlogNews->delete();
        return 'success';
    }
}
