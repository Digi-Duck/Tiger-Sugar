<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function distribution(){
        return view('front.distribution');
    }

    public function distributionConfirm(){
        return view('front.distribution-confirm');
    }

    public function franchisee(){
        return view('front.franchisee');
    }

    public function franchiseeForm(){
        return view('front.franchisee-form');
    }
}
