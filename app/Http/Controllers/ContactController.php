<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $lists = Contact::query();
        $keyword = $request->keyword ?? '';
        $page_numbers = $request->page_numbers;
        $page = $request->page;
        $count = $lists->count();

        if ($request->filled('keyword')) {
            $lists->where('user_name', 'like', "%{$keyword}%")
                ->orwhere('birth_day', 'like', "%{$keyword}%")
                ->orwhere('email', 'like', "%{$keyword}%")
                ->orwhere('phone', 'like', "%{$keyword}%")
                ->orwhere('address', 'like', "%{$keyword}%")
                ->orwhere('store_address', 'like', "%{$keyword}%")
                ->orwhere('other', 'like', "%{$keyword}%")
                ->orWhereHas('Country', function ($query) use ($keyword) {
                    $query->where('country_name', 'like', "%{$keyword}%")
                        ->orwhere('country_en_name', 'like', "%{$keyword}%");
                });
        }

        if ($page_numbers == null) {
            $page_numbers = 10;
        }

        if ($page == null) {
            $page = 1;
        }
        $lists->orderBy('id');
        $lists = $lists->paginate($page_numbers);
        $lists->appends(compact('lists', 'keyword', 'page_numbers'));
        return view('backend.contact.index', compact('lists', 'keyword', 'page_numbers', 'page', 'count'));
    }
    // public function index()
    // {
    //     $lists = Contact::all();
    //     return view('backend.contact.index',compact('lists'));
    // }

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
