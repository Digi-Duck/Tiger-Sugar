<?php

namespace App\Http\Controllers;

use App\Rfq;
use App\Lang;
use App\News;
use App\Media;
use App\Banner;
use App\Social;
use App\Contact;
use App\BlogNews;
use App\Products;
use App\DrinkType;
use App\DrinkTypeEn;
use App\Franchise;
use App\Continent;
use App\ProductsType;
use App\FranchiseExplain;
use App\Mail\sellingfillout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestHost;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;



class FrontController extends Controller
{

    public function index()
    {
        return view('front.index');
    }

    public function index_building()
    {
        $enDomain = "en.tigersugar.com";

        $banners = Banner::orderBy('sort','asc')->get();
        $aboutNews = News::orderBy('sort','asc')->get();
        $social = Social::orderBy('sort','asc')->get();
        // $franchises = Franchise::with('area')->with('stores')->withCount('stores')->orderBy('sort','asc')->get();
        $continents = Continent::with('country')->get();

        if(RequestHost::getHost() != $enDomain){
            $drink_types = DrinkType::orderBy('sort','asc')->get();
        }
        else{
            $drink_types = DrinkTypeEn::orderBy('sort','asc')->get();
        }
        $bloggerNews = BlogNews::orderBy('sort','asc')->get();
        $media = Media::orderBy('sort','asc')->get();
        $lang_settings = Lang::all();
        $products = Products::orderBy('sort','asc')->take(6)->get();

        return view('front.index_building',compact('lang_settings','social','aboutNews','continents','drink_types','media','bloggerNews','banners','products'));
    }

    public function join()
    {
        $enDomain = "en.tigersugar.com";
        if(RequestHost::getHost() != $enDomain){
            return view('front.join_us');
        }
        else{
            return view('front.join_us_en');
        }
    }
    public function distribution()
    {
        $products = Products::with('productsType')->orderBy('sort','asc')->paginate(9);
        $suggest = Products::with('productsType')->orderBy('sort','asc')->paginate(6);
        $productTypes = ProductsType::all();
        return view('front.distribution',compact('products','suggest','productTypes'));
    }
    public function distributionType($id)
    {
        $products=Products::with('productsType')->orderBy('sort','asc')->where('type_id',$id)->paginate(9);
        $suggest=Products::with('productsType')->orderBy('sort','asc')->paginate(6);
        $productTypes = ProductsType::orderBy('sort','asc')->get();
        return view('front.distribution',compact('products','suggest','productTypes'));
    }

    public function sellingfillout()
    {
        $contents = \Cart::getContent();
        $products_id = [];
        foreach($contents as $content){
            array_push($products_id,$content->id);
        }

        $suggest=Products::with('productsType')->orderBy('sort','asc')->paginate(6);
        $products =Products::with('productsType')->orderBy('sort','asc')->whereIn('id',$products_id)->paginate(12);
        $countries = Franchise::orderBy('sort','desc')->get();
        $productTypes = ProductsType::orderBy('sort','asc')->get();
        return view('front.sellingfillout',compact('countries','products','suggest','productTypes'));
    }
    public function sellingfilloutType($id)
    {
        $contents = \Cart::getContent();
        $products_id = [];
        foreach($contents as $content){
            array_push($products_id,$content->id);
        }

        $suggest=Products::with('productsType')->orderBy('sort','asc')->paginate(6);
        $products =Products::with('productsType')->orderBy('sort','asc')->where('type_id',$id)->whereIn('id',$products_id)->paginate(12);
        $countries = Franchise::orderBy('sort','desc')->get();
        $productTypes = ProductsType::orderBy('sort','asc')->get();
        return view('front.sellingfillout',compact('countries','products','suggest','productTypes'));
    }
    public function sellingfillout_store(Request $request){
        if(\Cart::getTotalQuantity()>0){
             // 儲存資料
            $item = Rfq::create($request->all());
            // 儲存product_id
            $products_id = [];
            $contents = \Cart::getContent();

            foreach($contents as $content){
                array_push($products_id,$content->id);
            }

            $item->products_id = json_encode($products_id);

            // 發送提醒信給業主

            // 測試用
            // Mail::to('silently0801@gmail.com')->send(new \App\Mail\sellingfillout($item));
            // 正式用
            Mail::to('oversea.tigersugar@gmail.com')->send(new \App\Mail\sellingfillout($item));

            $item->save();

            return redirect('/distribution')->with('success','感謝您的來信!');
        }
        else{
            return redirect('/distribution')->with('fail','請至少選擇一項產品!');
        }

    }

    public function getproductdetail(Request $request)
    {
        $product=Products::with('productsType','productsImgs')->find($request->id);
        return $product;
    }

    public function join_store(Request $request)
    {
        $v = Validator::make(request()->all(), [
            'g-recaptcha-response' => 'recaptcha',
        ]);

        if ($v->fails()) {
            return redirect()->back()->with('message', '請勾選"我不是機器人"');
        }

        $new_record = new Contact();
        $new_record -> user_name = $request->user_name;
        $new_record -> birth_day  = $request->birth_day;
        $new_record -> email  = $request->email;
        $new_record -> phone  = $request->phone;
        $new_record -> address  = $request->address;
        $new_record -> country  = $request->country.','.$request->country_region;
        $new_record -> store_address  = $request->country.','.$request->country_region.','.$request->store_address;
        $new_record -> other  = $request->other;
        $new_record -> save();

        $info = '感謝您的資料填寫，我們會於近期再派相關業務人員與您做進一步聯繫。<br>Thank you for filling in the information, we will send relevant business personnel to contact you further in the near future.';

        Mail::to('oversea.tigersugar@gmail.com')->send(new \App\Mail\Contact($new_record));

        //send mail to alert
        //check is Taiwan (台灣)

        // $taiwan_array=['台灣','臺灣','taiwan','Taiwan','TAIWAN','臺北','台北','新北','桃園','臺中','台中','臺南','台南','高雄','基隆','新竹','嘉義','苗栗','彰化','南投','雲林','屏東','宜蘭','花蓮','台東','臺東','澎湖','金門','馬祖','連江'];

        // if($this->contains($request->country,$taiwan_array) || $this->contains($request->store_address,$taiwan_array)){

        //     Mail::to('tigersugar62192859@gmail.com')->send(new \App\Mail\Contact($new_record));
        // }else{

        //     Mail::to('oversea.tigersugar@gmail.com')->send(new \App\Mail\Contact($new_record));
        // }

        return redirect('/join-us')->with('message',$info);
    }

    public function contains($str, array $arr)
    {
        foreach($arr as $a) {
            if (stripos($str,$a) !== false) return true;
        }
        return false;
    }
    // 新增加盟說明頁面
    public function explain(){
        $lists = FranchiseExplain::all();

        $enDomain = "en.tigersugar.com";
        if(RequestHost::getHost() != $enDomain){

            return view('front.franchise_explain',compact('lists'));
        }
        else{
            return view('front.franchise_explain_en',compact('lists'));
        }
    }
}
