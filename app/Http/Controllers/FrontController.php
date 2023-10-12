<?php

namespace App\Http\Controllers;

use App\Models\BlogNews;
use App\Models\DrinkType;
use App\Models\Media;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $blognews = BlogNews::orderBy('sort','asc')->get();
        $medias = Media::orderBy('sort','asc')->get();
        $drink_types = DrinkType::orderBy('sort','asc')->get();
        return view('frontend.index',compact('blognews','medias', 'drink_types'));
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
