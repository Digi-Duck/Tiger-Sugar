<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BlogNews;
use App\Models\DrinkTypeEn;
use App\Models\FranchiseExplain;
use App\Models\Media;
use App\Models\Products;
use App\Models\Social;
use Illuminate\Http\Request;

class FrontEnController extends Controller
{
    public function index() {
        $banners = Banner::orderBy('sort', 'asc')->get();
        $social = Social::orderBy('sort', 'asc')->get();
        $blognews = BlogNews::orderBy('sort', 'asc')->get();
        $medias = Media::orderBy('sort', 'asc')->get();
        $drink_types = DrinkTypeEn::orderBy('sort', 'asc')->get();
        $products = Products::orderBy('sort', 'asc')->take(6)->get();
        return view('frontend_en.index_en', compact('blognews', 'medias', 'drink_types', 'products', 'social', 'banners'));
    }

    public function distribution() {
        return view('frontend_en.distribution_en');
    }

    public function distributionConfirm() {
        return view('frontend_en.distribution-confirm_en');
    }

    public function franchisee() {
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
        return view('frontend_en.franchisee_en', compact('franchise_explains', 'oddItems', 'evenItems'));
    }

    public function franchiseeForm() {
        return view('frontend_en.franchisee-form_en');
    }
}
