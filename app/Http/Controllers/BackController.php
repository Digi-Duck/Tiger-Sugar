<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BackController extends Controller
{
    public function index()
    {
        return view('layouts.backend-template');
    }

    public function reset()
    {
        $id = Auth::user()->id;
        $user_info = User::find($id);
        if($user_info)
        {
            return view('backend.account.reset',compact('id','user_info'));
        }
        else
        {
            return redirect()->back()->with('message','無此用戶');
        }
    }
    public function reset_store(Request $request,$id)
    {
        $request->validate([
            'password' => 'required|min:8',
        ], [
            'name.required' => '必填',
            'name.min' => '密碼長度過短',
        ]);
        $edit_user = User::find($id);
        $edit_user->update([
            'password' => $request->password,
        ]);
        return redirect('back/reset')->with('message','修正成功!');
    }
}
