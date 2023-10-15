<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BlogNews;
use App\Models\DrinkType;
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
        $products = Products::with('ProductsType','ProductsImgs')->orderBy('sort','asc')->get();
        return view('frontend.distribution',compact('products'));
    }

    public function distributionConfirm()
    {
        return view('frontend.distribution-confirm');
    }

    public function franchisee()
    {
        return view('frontend.franchisee');
    }

    public function franchiseeForm()
    {
        return view('frontend.franchisee-form');
    }
    public function franchiseeFormStore(Request $request)
    {
        dd($request->all());

        $request->validate([
            'user_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'country' => 'required|max:255',
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
    }
}
