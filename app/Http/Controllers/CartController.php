<?php

namespace App\Http\Controllers;

use App\Products;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProductToCar(Request $request){
        $product_id = $request->product_id;
        if(!\Cart::get($product_id)){
            \Cart::add(array(
                'id' => $product_id, // inique row ID
                'name' => 'Sample Item',
                'price' => 0,
                'quantity' => 1,
                'attributes' => array()
            ));
        }
        $contents = \Cart::getContent();
        $products_id = [];
        foreach($contents as $content){
            array_push($products_id,$content->id);
        }

        
        $data['qty']=count(\Cart::getContent());
        $data['products'] =Products::with('productsType')->whereIn('id',$products_id)->paginate(12);
        return $data;
    }
    public function addAllProductToCar(Request $request){
        $product_id = $request->product_id;
        $products = Products::all();
        $insert = [];
        foreach ($products as $key => $product) {
            $insert[$key]=array(
                    'id' => $product->id, // inique row ID
                    'name' => 'Sample Item',
                    'price' => 0,
                    'quantity' => 1,
                    'attributes' => array() 
                );
        }
      
        if($insert){    
            \Cart::add($insert);
        }

        $contents = \Cart::getContent();
        $products_id = [];
        foreach($contents as $content){
            array_push($products_id,$content->id);
        }


        $data['qty']=count(\Cart::getContent());
        $data['products'] =Products::with('productsType')->whereIn('id',$products_id)->paginate(12);

        return $data;
    }
    public function delProductToCar(Request $request){
        
        $product_id = $request->product_id;
        if(\Cart::get($product_id)){
            \Cart::remove($product_id);
        }

        $contents = \Cart::getContent();
        $products_id = [];
        foreach($contents as $content){
            array_push($products_id,$content->id);
        }

        
        $data['qty']=count(\Cart::getContent());
        $data['products'] =Products::with('productsType')->whereIn('id',$products_id)->paginate(12);
        return $data;
    }
    public function clearCart()
    {
        \Cart::clear();
        $data['qty']=count(\Cart::getContent());
        return $data;
    }

    public function getContent()
    {
        $content = \Cart::getContent();
        dd($content);
    }

    public function TotalCart()
    {
        $total = \Cart::getTotal();
    }
}
