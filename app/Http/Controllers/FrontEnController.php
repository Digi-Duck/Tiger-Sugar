<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEnController extends Controller
{
    public function index() {
        // $banners = Banner::orderBy('sort','asc')->get();
        // $social = Social::orderBy('sort', 'asc')->get();
        // $blognews = BlogNews::orderBy('sort','asc')->get();
        // $medias = Media::orderBy('sort','asc')->get();
        // $drink_types = DrinkType::orderBy('sort','asc')->get();
        // $products = Products::orderBy('sort', 'asc')->take(6)->get();
        return view('frontend_en.index_en');
        // ,compact('blognews','medias', 'drink_types', 'products', 'social', 'banners')
    }
}
