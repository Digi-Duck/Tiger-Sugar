<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FranchiseExplain;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
class FranchiseExplainController extends Controller
{
    // function __construct()
    // {
    //     $this->redirect = '/admin';
    //     $this->index = 'admin.franchise_explain.index';
    //     $this->create = 'admin.franchise_explain.create';
    //     $this->edit = 'admin.franchise_explain.edit';
    // }
    public function index(){
        $lists = FranchiseExplain::all();
        return view('backend.franchise_explain.index',compact('lists'));
    }

    public function create(){
        return view('backend.franchise_explain.create');
    }

    // 後台form表單上傳
    public function store(Request $request){

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'english_title' => 'required|max:255',
            'english_content' => 'required',
        ]);

        FranchiseExplain::create([
            'title' => $request->title,
            'content' => $request->content,
            'english_title' => $request->english_title,
            'english_content' => $request->english_content,
        ]);
        return redirect(route('back.franchise_explain.index'))->with('message','新增成功!');
    }
    // public function delete($id){
    //     DB::table('franchise_explains')->where('id','=',$id)->delete();
    //     return redirect('/admin/franchise_explain')->with('message','刪除成功!');
    // }

    public function delete(Request $request)
    {
        $id = $request->id;
        $FranchiseExplain = FranchiseExplain::find($id);
        $FranchiseExplain->delete();
        return 'success';
    }
}
