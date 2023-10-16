<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BlogNews;
use App\Models\Contact;
use App\Models\DrinkType;
use App\Models\FranchiseExplain;
use App\Models\Media;
use App\Models\Products;
use App\Models\Social;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('sort', 'asc')->get();
        $social = Social::orderBy('sort', 'asc')->get();
        $blognews = BlogNews::orderBy('sort', 'asc')->get();
        $medias = Media::orderBy('sort', 'asc')->get();
        $drink_types = DrinkType::orderBy('sort', 'asc')->get();
        $products = Products::orderBy('sort', 'asc')->take(6)->get();
        return view('frontend.index', compact('blognews', 'medias', 'drink_types', 'products', 'social', 'banners'));
    }

    public function distribution()
    {
        $products = Products::with('ProductsType', 'ProductsImgs')->orderBy('sort', 'asc')->get();
        // dd($products);
        return view('frontend.distribution', compact('products'));
    }

    public function distributionConfirm()
    {
        return view('frontend.distribution-confirm');
    }

    public function franchisee()
    {
        $franchise_explains = FranchiseExplain::orderBy('id')->get();
        $item = 1;
        foreach ($franchise_explains as $value) {
            $value->sequence = $item;
            $item++;
        };
        $oddItems = [];
        $evenItems = [];

        foreach ($franchise_explains as $item) {
            if ($item->sequence % 2 == 1) {
                $oddItems[] = $item;
            } else {
                $evenItems[] = $item;
            }
        }
        return view('frontend.franchisee', compact('franchise_explains', 'oddItems', 'evenItems'));
    }

    public function franchiseeForm()
    {
        return view('frontend.franchisee-form');
    }
    public function franchiseeFormStore(Request $request)
    {

        $request->validate([
            'user_name' => 'required|max:255',
            'birth_day' => 'required',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'franchisee_type' => 'required',
            'country' => 'required|max:255',
            'capital' => 'required',
            'store_address' => 'required|max:255',
            'other' => 'max:255',
        ], [
            'user_name.required' => '姓名必填',
            'user_name.max' => '姓名最多不能超過255個字',
            'email.required' => '電子信箱必填',
            'email.max' => '電子信箱最多不能超過255個字',
            'phone.required' => '聯絡電話必填',
            'phone.max' => '聯絡電話最多不能超過255個字',
            'address.required' => '通訊地址必填',
            'address.max' => '通訊地址最多不能超過255個字',
            'country.required' => '預定加盟城市必填',
            'country.max' => '預定加盟城市最多不能超過255個字',
            'other' => '其他最多不能超過255個字',
        ]);

        Contact::create([
            'user_name' => $request->user_name,
            'birth_day' => $request->birth_day,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'franchisee_type' => $request->franchisee_type,
            'country' => $request->country,
            'capital' => $request->capital,
            'store_address' => $request->store_address,
            'other' => $request->other,
        ]);

        return view('frontend.franchisee-form');
    }
}
