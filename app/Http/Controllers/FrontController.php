<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        return view('frontend.index');
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
