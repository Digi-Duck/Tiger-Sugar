<?php

namespace App\Http\Controllers;

use App\MOdels\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index(Request $request)
    {
        $lists = News::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;
        $page = $request->page;
        $count = $lists->count();

        if ($request->filled('keyword')) {
            $lists->where('info', 'like', "%{$keyword}%");
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
        return view('backend.news.index',compact('lists', 'keyword', 'page_numbers', 'page', 'count'));
    }

    public function create()
    {
        return view('backend.news.create');
    }

    public function store(Request $request)
    {
        $request->session()->put('title', $request->title);
        $request->session()->put('info', $request->info);
        $request->session()->put('sort', $request->sort);

        $request->validate([
            'title' => 'required|max:255',
            'info' => 'required',
            'sort' => 'required|max:11',
        ],[
            'title.required' => '標題必填',
            'title.max' => '標題不能超過255個字',
            'info.required' => '內容必填',
            'sort.required' => '權重必填',
            'sort.max' => '權重不能超過11個字',
        ]);
        News::create([
            'title' => $request->title,
            'info' => $request->info,
            'sort' => $request->sort,
        ]);

        return redirect(route('back.news.index'))->with('message','新增成功!');
    }

    public function edit(Request $request, $id)
    {
        $list = News::find($id);
        return view('backend.news.edit',compact('list'));
    }

    public function update(Request $request,$id)
    {
        $News = News::find($id);
        $request->validate([
            'title' => 'required|max:255',
            'info' => 'required',
            'sort' => 'required|max:11',
        ],[
            'title.required' => '標題必填',
            'title.max' => '標題不能超過255個字',
            'info.required' => '內容必填',
            'sort.required' => '權重必填',
            'sort.max' => '權重不能超過11個字',
        ]);
        $News->update([
            'title' => $request->title,
            'info' => $request->info,
            'sort' => $request->sort,
        ]);
        return redirect(route('back.news.index'))->with('message','更新成功!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $News = News::find($id);
        $News->delete();
        return 'success';
    }
}
