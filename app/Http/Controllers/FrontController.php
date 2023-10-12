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
    public function index() {
        $banners = Banner::orderBy('sort','asc')->get();
        $social = Social::orderBy('sort', 'asc')->get();
        $blognews = BlogNews::orderBy('sort','asc')->get();
        $medias = Media::orderBy('sort','asc')->get();
        $drink_types = DrinkType::orderBy('sort','asc')->get();
        $products = Products::orderBy('sort', 'asc')->take(6)->get();
        return view('frontend.index',compact('blognews','medias', 'drink_types', 'products', 'social', 'banners'));
    }

    public function distribution() {
        return view('frontend.distribution');
    }

    public function distributionConfirm() {
        return view('frontend.distribution-confirm');
    }

    public function franchisee() {
        return view('frontend.franchisee');
    }

    public function franchiseeForm() {
        return view('frontend.franchisee-form');
    }
}
