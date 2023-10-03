<?php

namespace App\Http\Controllers;

use App\Products;
use App\ProductsType;
use App\ProductsImgs;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.products.index';
        $this->create = 'admin.products.create';
        $this->edit = 'admin.products.edit';
    }

    public function index()
    {
        $lists = Products::orderBy('sort','desc')->get();
        return view($this->index, compact('lists'));
    }

    public function create()
    {
        $types = ProductsType::all();
        return view($this->create, compact('types'));
    }

    public function store(Request $request)
    {
        $new_product = new Products();
        $new_product->sort  = $request->sort;
        $new_product->title_zh  = $request->title_zh;
        $new_product->title_en  = $request->title_en;
        $new_product->type_id  = $request->type_id;
        $new_product->info  = $request->info;
        if ($request->hasFile('img')) {
            $new_product->img = $this->fileUpload($request->file('img'), 'product_imgs');
        }
        else{
            $new_product->img = '';
        }
        $new_product->launch_date  = $request->launch_date;
        $new_product->weight  = $request->weight;
        $new_product->shelf_life  = $request->shelf_life;
        $new_product->preserve  = $request->preserve;
        $new_product->content  = $request->content;
        $new_product->notes  = $request->notes;
        $new_product->video  = $request->video;
        $new_product->save();
   
        //多個檔案
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $file) {
                //上傳圖片
                $path = $this->fileUpload($file, 'product_imgs');
                //新增資料進DB
                $product_img = new ProductsImgs;
                $product_img->product_id = $new_product->id;
                $product_img->img_url = $path;
                $product_img->save();
            }
        }
        
        return redirect('/admin/products')->with('message', '新增成功!');
    }

    public function edit($id)
    {
        $list = Products::find($id);
        $types = ProductsType::all();
        return view($this->edit, compact('list', 'id', 'types'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);

        $requestData = $request->all();
        //有新的主要圖
        if($request->hasFile('img')){
            $old_product_img = $product->img;
            if (file_exists(public_path() . $old_product_img)) {
                File::delete(public_path() . $old_product_img);
            }
            $requestData['img'] =  $this->fileUpload($request->file('img'), 'product_imgs');
        }

        //多個檔案
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $file) {
                //上傳圖片
                $path = $this->fileUpload($file, 'product_imgs');
                //新增資料進DB
                $product_img = new ProductsImgs;
                $product_img->product_id = $product->id;
                $product_img->img_url = $path;
                $product_img->save();
            }
        }

        $product->update($requestData);

        return redirect('/admin/products')->with('message', '更新成功!');
    }

    public function delete($id)
    {
        $product = Products::find($id);
        $product_imgs = ProductsImgs::where('product_id', $id)->get();
        foreach ($product_imgs as $product_img) {
            $old_product_img = $product_img->img_url;
            if (file_exists(public_path() . $old_product_img)) {
                File::delete(public_path() . $old_product_img);
            }
            $product_img->delete();
        }
        $product->delete();

        return redirect('/admin/products')->with('message', '刪除成功!');
    }
    //刪除圖片deleteImg
    
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

    //上傳檔案
    private function fileUpload($file, $dir)
    {
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $dir)) {
            mkdir('upload/' . $dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path() . '/upload/' . $dir . '/' . $filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/' . $dir . '/' . $filename;
    }
}
