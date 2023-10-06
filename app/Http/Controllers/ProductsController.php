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
            'title_en.max' => '商品名稱（英）最多只能輸入255個字',
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

        // //多個檔案
        // if ($request->hasFile('imgs')) {
        //     $files = $request->file('imgs');
        //     foreach ($files as $file) {
        //         //上傳圖片
        //         $path = $this->fileUpload($file, 'product_imgs');
        //         //新增資料進DB
        //         $product_img = new ProductsImgs;
        //         $product_img->product_id = $new_product->id;
        //         $product_img->img_url = $path;
        //         $product_img->save();
        //     }
        // }

        return redirect(route('back.products.index'))->with('message', '新增成功!');
    }

    // public function edit($id)
    // {
    //     $list = Products::find($id);
    //     $types = ProductsType::all();
    //     return view($this->edit, compact('list', 'id', 'types'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $product = Products::find($id);

    //     $requestData = $request->all();
    //     //有新的主要圖
    //     if($request->hasFile('img')){
    //         $old_product_img = $product->img;
    //         if (file_exists(public_path() . $old_product_img)) {
    //             File::delete(public_path() . $old_product_img);
    //         }
    //         $requestData['img'] =  $this->fileUpload($request->file('img'), 'product_imgs');
    //     }

    //     //多個檔案
    //     if ($request->hasFile('imgs')) {
    //         $files = $request->file('imgs');
    //         foreach ($files as $file) {
    //             //上傳圖片
    //             $path = $this->fileUpload($file, 'product_imgs');
    //             //新增資料進DB
    //             $product_img = new ProductsImgs;
    //             $product_img->product_id = $product->id;
    //             $product_img->img_url = $path;
    //             $product_img->save();
    //         }
    //     }

    //     $product->update($requestData);

    //     return redirect('/admin/products')->with('message', '更新成功!');
    // }

    // public function delete($id)
    // {
    //     $product = Products::find($id);
    //     $product_imgs = ProductsImgs::where('product_id', $id)->get();
    //     foreach ($product_imgs as $product_img) {
    //         $old_product_img = $product_img->img_url;
    //         if (file_exists(public_path() . $old_product_img)) {
    //             File::delete(public_path() . $old_product_img);
    //         }
    //         $product_img->delete();
    //     }
    //     $product->delete();

    //     return redirect('/admin/products')->with('message', '刪除成功!');
    // }
    // //刪除圖片deleteImg

    // public function deleteImg(Request $request)
    // {
    //     $product_img = ProductsImgs::find($request->id);
    //     $old_product_img = $product_img->img_url;
    //     if (file_exists(public_path() . $old_product_img)) {
    //         File::delete(public_path() . $old_product_img);
    //     }
    //     $product_img->delete();

    //     return "success";
    // }

    // //上傳檔案
    // private function fileUpload($file, $dir)
    // {
    //     //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
    //     if (!is_dir('upload/')) {
    //         mkdir('upload/');
    //     }
    //     //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
    //     if (!is_dir('upload/' . $dir)) {
    //         mkdir('upload/' . $dir);
    //     }
    //     //取得檔案的副檔名
    //     $extension = $file->getClientOriginalExtension();
    //     //檔案名稱會被重新命名
    //     $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
    //     //移動到指定路徑
    //     move_uploaded_file($file, public_path() . '/upload/' . $dir . '/' . $filename);
    //     //回傳 資料庫儲存用的路徑格式
    //     return '/upload/' . $dir . '/' . $filename;
    // }
}
