<?php

namespace App\Http\Controllers;

use App\Area;
use App\Franchise;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.area.index';
        $this->create = 'admin.area.create';
        $this->edit = 'admin.area.edit';
    }

    public function index()
    {
        $lists = Area::all();
        return view($this->index,compact('lists'));
    }

    public function create()
    {
        $types = Franchise::all();
        return view($this->create,compact('types'));
    }

    public function store(Request $request)
    {
        $new_record = new Area();
        $new_record -> franchise_id  = $request->franchise_id;
        $new_record -> area_name  = $request->area_name;
        $new_record -> sort  = $request->sort;
        $new_record -> save();
        return redirect('/admin/area')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $types = Franchise::all();
        $list = Area::find($id);
        return view($this->edit,compact('list','types'));
    }

    public function update(Request $request,$id)
    {
        $Area = Area::find($id);
        $Area -> franchise_id  = $request->franchise_id;
        $Area -> area_name  = $request->area_name;
        $Area -> sort  = $request->sort;

        $Area -> save();
        return redirect('/admin/area')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $Area = Area::find($id);
        $Area->delete();
        return redirect('/admin/area')->with('message','刪除成功!');
    }
}
