<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.news.index';
        $this->create = 'admin.news.create';
        $this->edit = 'admin.news.edit';
    }

    public function index()
    {
        $lists = News::all();
        return view($this->index,compact('lists'));
    }

    public function create()
    {
        return view($this->create);
    }

    public function store(Request $request)
    {
        $new_record = new News();
        $new_record -> title  = $request->title;
        $new_record -> info  = $request->info;
        $new_record -> sort  = $request->sort;
        $new_record -> save();
        return redirect('/admin/news')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $list = News::find($id);
        return view($this->edit,compact('list'));
    }

    public function update(Request $request,$id)
    {
        $News = News::find($id);
        $News -> title  = $request->title;
        $News -> info  = $request->info;
        $News -> sort  = $request->sort;

        $News -> save();
        return redirect('/admin/news')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $News = News::find($id);
        $News->delete();
        return redirect('/admin/news')->with('message','刪除成功!');
    }
}
