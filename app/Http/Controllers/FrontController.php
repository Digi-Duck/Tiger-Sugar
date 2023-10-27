<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BlogNews;
use App\Models\Contact;
use App\Models\DrinkType;
use App\Models\FranchiseExplain;
use App\Models\Media;
use App\Models\Products;
use App\Models\ProductsType;
use App\Models\Rfq;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;

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
        $product_id = session()->get('product_id', '');
        $product_count = count($product_id);
        $product_all = [];
        $product_all = Arr::prepend($product_all, $product_id);
        return view('frontend.index', compact('blognews', 'medias', 'drink_types', 'products', 'social', 'banners', 'product_id', 'product_all','product_count'));
    }

    public function distribution(Request $request)
    {
        $products = Products::with('ProductsType', 'ProductsImgs')
            ->orderBy('sort', 'asc')
            ->paginate(9);
        $currentPage = $products->currentPage();
        $lastPage = $products->lastPage();
        $product_id = session()->get('product_id', '');
        $product_count = count($product_id);

        $random_products = Products::inRandomOrder()->take(6)->get();
        return view('frontend.distribution', compact('products', 'random_products', 'product_count'));
    }



    public function distributionConfirm()
    {
        $productsType = ProductsType::orderBy('sort', 'asc')->get();
        $product_id = session()->get('product_id', '');
        $product_count = count($product_id);
        $products = Products::where('id', '=', $product_id)->get();
        return view('frontend.distribution-confirm', compact('productsType', 'product_count', 'products'));
    }

    public function distributionConfirmStore(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'birthday' => 'required',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'channel' => 'required',
            'country' => 'required',
        ], [
            'name.required' => '名字必填',
            'name.max' => '名字字數不可超過255個字',
            'birthday' => '出生年月日必填',
            'email.required' => '電子信箱必填',
            'email.max' => '電子信箱字數不可超過255個字',
            'phone.required' => '聯絡電話必填',
            'phone.max' => '聯絡電話字數不可超過255個字',
            'channel.required' => '經銷通路必填',
            'country.required' => '國家必填',
        ]);
        Rfq::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'channel' => $request->channel,
            'city' => $request->country,
            'other' => $request->other,
            'products_id' => 1,
        ]);
        return redirect(route('front.franchisee_form'));
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
        $request->session()->put('user_name', $request->user_name);
        $request->session()->put('birth_day', $request->birth_day);
        $request->session()->put('email', $request->email);
        $request->session()->put('phone', $request->phone);
        $request->session()->put('address', $request->address);
        $request->session()->put('franchisee_type', $request->franchisee_type);
        $request->session()->put('country', $request->country);
        $request->session()->put('capital', $request->capital);
        $request->session()->put('store_address', $request->store_address);
        $request->session()->put('other', $request->other);
        $user_name = $request->session()->get('user_name', '');
        $birth_day = $request->session()->get('birth_day', '');
        $email = $request->session()->get('email', '');
        $phone = $request->session()->get('phone', '');
        $address = $request->session()->get('address', '');
        $franchisee_type = $request->session()->get('franchisee_type', '');
        $birth_day = $request->session()->get('country', '');
        $country = $request->session()->get('email', '');
        $capital = $request->session()->get('capital', '');
        $store_address = $request->session()->get('store_address', '');
        $other = $request->session()->get('other', '');
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
            'store_address' => '預計加盟城市地址不能超過255個字',
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

        return view('frontend.franchisee-form', compact('user_name', 'birth_day', 'email', 'phone', 'address', 'franchisee_type', 'country', 'capital', 'store_address', 'other'));
    }

    public function franchiseeFormStore_en(Request $request)
    {
        $request->session()->put('user_name', $request->user_name);
        $request->session()->put('birth_day', $request->birth_day);
        $request->session()->put('email', $request->email);
        $request->session()->put('phone', $request->phone);
        $request->session()->put('address', $request->address);
        $request->session()->put('franchisee_type', $request->franchisee_type);
        $request->session()->put('country', $request->country);
        $request->session()->put('capital', $request->capital);
        $request->session()->put('store_address', $request->store_address);
        $request->session()->put('other', $request->other);
        $user_name = $request->session()->get('user_name', '');
        $birth_day = $request->session()->get('birth_day', '');
        $email = $request->session()->get('email', '');
        $phone = $request->session()->get('phone', '');
        $address = $request->session()->get('address', '');
        $franchisee_type = $request->session()->get('franchisee_type', '');
        $birth_day = $request->session()->get('country', '');
        $country = $request->session()->get('email', '');
        $capital = $request->session()->get('capital', '');
        $store_address = $request->session()->get('store_address', '');
        $other = $request->session()->get('other', '');
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

        return view('frontend.franchisee-form', compact('user_name', 'birth_day', 'email', 'phone', 'address', 'franchisee_type', 'country', 'capital', 'store_address', 'other'));
    }
    public function add(Request $request)
    {
        $request->session()->put('product_id', $request->add);
        return redirect(route('front.index'));
    }

    public function addToCart(Request $request)
    {
        $cart = session()->get('product_id', '');
        if(!in_array($request->id,$cart)){
            array_push($cart, $request->id);
            $request->session()->put('product_id', $cart);
            return 'success';
        }else{
            return '';
        }
    }
}
