<?php

namespace App\Http\Controllers;

use App\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SeoController extends Controller
{
    public function index(){
        $seoes = Seo::all();
        return view('admin.seo.index',compact('seoes'));
    }

    public function update(Request $request,$id){
        $data = $request->all();
        Seo::find($id)->update($data);
        return redirect('/admin/seo')->with('message','更新成功!');
    }
}
