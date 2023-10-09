<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $lists = Contact::all();
        return view('backend.contact.index',compact('lists'));
    }

    public function show($id)
    {
        $contact_info = Contact::find($id);
        return view('backend.contact.show',compact('contact_info'));
    }

    public function delete($id)
    {
        $Contact = Contact::find($id);
        $Contact->delete();

        return redirect(route('back.contact.index'))->with('message','刪除成功!');
    }

    public function delete_all(Request $request)
    {
        $Contact = Contact::all();

        $Contact->each(function ($item, $key) {
            $item->delete();
        });
        return redirect('/admin/contact')->with('message','刪除所有加盟來信資料成功! 若為誤刪，請聯絡製作網頁廠商，可再進行資料復原。');
    }
}
