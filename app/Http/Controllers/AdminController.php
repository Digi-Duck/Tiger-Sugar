<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('home');
    }

    //summernote_image_ajax
    public function image_post(Request $request)
    {
        $allowed = array("png", "jpg", "gif", "PNG", "JPG", "GIF","jpeg","JPEG");
        if($request->hasFile('file')){
            $file =  $request->file('file');
            $extension = $file->getClientOriginalExtension();
            if(!in_array($extension, $allowed)){
                echo '{"status":"error"}';
                exit;
            }

            $filename = $file->getFilename() . '.' . $extension;
            $destination = public_path() .'/images/summernote_upload/';
            $file->move($destination,$filename);
            echo "/images/summernote_upload/".$filename;
        }
        exit;
    }

    public function edit_password($id)
    {
        $user_info = User::find($id);
        if($user_info)
        {
            return view('admin.account.reset',compact('id','user_info'));
        }
        else
        {
            return redirect()->back()->with('message','無此用戶');
        }
    }
    public function edit_password_post(Request $request,$id)
    {
        $this->password_validator($request->all())->validate();
        $edit_user = User::find($id);
        $edit_user->password = Hash::make($request->password);
        $edit_user->save();
        return redirect('/admin')->with('message','修正成功!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    protected function password_validator(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
