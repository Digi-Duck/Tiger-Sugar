<?php

namespace App\Http\Controllers;

use App\Models\BlogNews;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $blognews = BlogNews::orderBy('sort','asc')->take(6)->get();
        return view('frontend.index',compact('blognews'));
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
