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

    public function distribution() {
        return view('frontend_en.distribution_en');
    }

    public function distributionConfirm() {
        return view('frontend_en.distribution-confirm_en');
    }

    public function franchisee() {
        return view('frontend_en.franchisee_en');
    }

    public function franchiseeForm() {
        return view('frontend_en.franchisee-form_en');
    }
}
