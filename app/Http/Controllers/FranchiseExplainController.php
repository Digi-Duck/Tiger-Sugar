<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FranchiseExplain;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
class FranchiseExplainController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.franchise_explain.index';
        $this->create = 'admin.franchise_explain.create';
        $this->edit = 'admin.franchise_explain.edit';
    }
    public function index(){
        $lists = FranchiseExplain::all();
        return view($this->index,compact('lists'));
    }
    public function create(){
        return view($this->create);
    }

    // 後台form表單上傳
    public function store(Request $request){
        $new_record = new FranchiseExplain();
        $new_record -> title = $request->title;
        $new_record -> content  = $request->content;
        $new_record -> english_title  = $request->english_title;
        $new_record -> english_content  = $request->english_content;
        $new_record -> save();
        return redirect('/admin/franchise_explain')->with('message','新增成功!');
    }
    public function delete($id){
        DB::table('franchise_explains')->where('id','=',$id)->delete();
        return redirect('/admin/franchise_explain')->with('message','刪除成功!');
    }
}
