<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FranchiseExplain;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class FranchiseExplainController extends Controller
{

    public function index(Request $request)
    {
        $lists = FranchiseExplain::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;
        $page = $request->page;
        $count = $lists->count();

        if ($request->filled('keyword')) {
            $lists->where('title', 'like', "%{$keyword}%")
                ->orwhere('content', 'like', "%{$keyword}%")
                ->orwhere('english_title', 'like', "%{$keyword}%")
                ->orwhere('english_content', 'like', "%{$keyword}%");
        }

        if ($page_numbers == null) {
            $page_numbers = 10;
        }

        if ($page == null) {
            $page = 1;
        }

        $lists = $lists->paginate($page_numbers);
        $lists->appends(compact('lists', 'keyword', 'page_numbers'));
        return view('backend.franchise_explain.index', compact('lists', 'keyword', 'page_numbers', 'page', 'count'));
    }

    public function create()
    {
        return view('backend.franchise_explain.create');
    }

    // 後台form表單上傳
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'english_title' => 'required|max:255',
            'english_content' => 'required',
        ],[
            'title.required' => '標題必填',
            'title.max' => '標題字數不可超過255個字',
            'content.required' => '內文必填',
            'english_title.required' => '標題（英）必填',
            'english_title.max' => '標題（英）字數不可超過255個字',
            'english_content' => '內文（英）必填',
        ]);

        FranchiseExplain::create([
            'title' => $request->title,
            'content' => $request->content,
            'english_title' => $request->english_title,
            'english_content' => $request->english_content,
        ]);
        return redirect(route('back.franchise_explain.index'))->with('message', '新增成功!');
    }
    
    public function delete(Request $request)
    {
        $id = $request->id;
        $FranchiseExplain = FranchiseExplain::find($id);
        $FranchiseExplain->delete();
        return 'success';
    }
}
