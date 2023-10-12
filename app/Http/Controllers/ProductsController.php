<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsType;
use App\Models\ProductsImgs;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Services\FileService;

class ProductsController extends Controller
{

    public function __construct(protected FileService $fileService)
    {
    }

    public function index()
    {
        $lists = Products::orderBy('sort','desc')->get();
        return view('backend.products.index', compact('lists'));
    }

    public function create()
    {
        $types = ProductsType::all();
        return view('backend.products.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sort' => 'required|max:11',
            'title_zh' => 'required|max:255',
            'title_en' => 'required|max:255',
            'type_id' => 'required|max:11',
            'info' => 'required|max:255',
            'img' => 'required',
            'launch_date' => 'required',
            'weight' => 'required|max:20',
            'shelf_life' => 'required|max:6',
            'preserve' => 'required',
            'content' => 'required',
            'video' => 'required',
        ],[
            'sort.required' => '權重必填',
            'sort.max' => '權重最多只能輸入11個數字',
            'title_zh.required' => '商品名稱（中）必填',
            'title_zh.max' => '商品名稱(中)最多只能輸入255個字',
            'title_en.required' => '商品名稱（英）必填',
            'title_en.max' => '商品名稱(英)最多只能輸入255個字',
            'type_id.required' => '分類必填',
            'type_id.max' => '分類最多只能輸入11個字',
            'info.required' => '商品簡介必填',
            'info.max' => '商品簡介最多只能輸入255個字',
            'img.required' => '照片必填',
            'launch_date.required' => '上市日期必填',
            'weight.required' => '淨重必填',
            'weight.max' => '淨重最多只能輸入20個字',
            'shelf_life.required' => '保存期限必填',
            'shelf_life.max' => '保存期限最多只能輸入6個字',
            'preserve.required' => '保存方式必填',
            'content.required' => '內容必填',
            'video.required' => '影片必填',
        ]);
        $products = Products::create([
            'sort' => $request->sort,
            'title_zh' => $request->title_zh,
            'title_en' => $request->title_en,
            'type_id' => $request->type_id,
            'info' => $request->info,
            'img' => $request->img,
            'launch_date' => $request->launch_date,
            'weight' => $request->weight,
            'shelf_life' => $request->shelf_life,
            'preserve' => $request->preserve,
            'content' => $request->content,
            'video' => $request->video,
        ]);
        $img = $this->fileService->imgUpload($request->file('img'), 'products-img');
        $products->update([
            'img' => $img,
        ]);

        //多個檔案
        foreach ($request->imgs ?? [] as $value) {
            ProductsImgs::create([
                'img_url' => $this->fileService->imgUpload($value, 'products-imgs'),
                'product_id' => $products->id,
            ]);
        }

        return redirect(route('back.products.index'))->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $list = Products::find($id);
        $types = ProductsType::all();
        return view('backend.products.edit', compact('list', 'id', 'types'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);


        $product->update([
            'sort' => $request->sort,
            'title_zh' => $request->title_zh,
            'title_en' => $request->title_en,
            'type_id' => $request->type_id,
            'info' => $request->info,
            'launch_date' => $request->launch_date,
            'weight' => $request->weight,
            'shelf_life' => $request->shelf_life,
            'preserve' => $request->preserve,
            'content' => $request->content,
            'video' => $request->video,
        ]);

        if ($request->hasFile('img')) {
            $img = $this->fileService->imgUpload($request->file('img'), 'products-img');
            $product->update([
            'img' => $img,
            ]);
        }
        if ($request->hasFile('imgs')){
            foreach ($product->ProductsImgs ?? [] as $value) {
                $this->fileService->deleteUpload($value->img_url);
                $value->delete();
            }
            foreach ($request->imgs ?? [] as $value) {
                ProductsImgs::create([
                    'img_url' => $this->fileService->imgUpload($value, 'products-imgs'),
                    'product_id' => $id,
                ]);
            }
        }
        return redirect(route('back.products.index'))->with('message', '更新成功!');
    }

    public function delete(Request $request)
    {

        $id = $request->id;
        $product_imgs = ProductsImgs::where('product_id', $id)->get();
        foreach ($product_imgs as $product_img) {
            $old_product_img = $product_img->img_url;
            if (file_exists(public_path() . $old_product_img)) {
                File::delete(public_path() . $old_product_img);
            }
            $product_img->delete();
        }
        $Products = Products::find($id);
        $Products->delete();
        return 'success';





    }
    // //刪除圖片deleteImg

    public function deleteImg(Request $request)
    {
        $product_img = ProductsImgs::find($request->id);
        $old_product_img = $product_img->img_url;
        if (file_exists(public_path() . $old_product_img)) {
            File::delete(public_path() . $old_product_img);
        }
        $product_img->delete();

        return "success";
    }
}
