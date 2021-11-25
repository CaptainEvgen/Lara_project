<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function getOneProduct($id){
        $product = Product::findOrFail($id);
        $restaurant =  $product->restaurant;
        return view('product.getOneProduct', [
            'name' => $product->name,
            'description' =>$product->description,
            'price' =>$product->price,
            'photo' =>$product->photo,
            'restaurant' =>$restaurant->name,
        ]);

    }
    public function newProduct(Request $request){

        if ($request->isMethod('post')){
            $data = $request->validate([
                'name' => 'required',
                'description' => 'string|max:64|nullable',
                'price'=> 'required|integer',
                'photo' => 'required|image:jpg, jpeg, png'
            ]);
            $product = new Product;
            $product->restaurant_id = Auth::user()->restaurant_id;
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->price = $data['price'];
            if($request->file('photo')){
                $photo = $request->file('photo');
                $photo = Controller::upload_image($photo, 'products');
                $product->photo =  $photo;
            };
            $product->save();
            return view('product.newProduct')->with('message', 'Данные отправлены');
        }
        return view('product.newProduct');
    }
}
