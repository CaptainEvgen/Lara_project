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
            'restaurant' =>$restaurant,
        ]);
    }
    public function getAllProducts(){
        $products = Product::inRandomOrder()->paginate(9);
        return view('product.getAllProducts', [
            'products' => $products,
        ]);
    }
    public function getByRestaurant($id){
        $products = Product::where('restaurant_id', $id)->get();
        $restaurant = Restaurant::findOrFail($id);
        return view('product.getByRestaurant', [
            'products' => $products,
            'restaurant' => $restaurant,
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
            return redirect('newProduct')->with('message', 'Данные отправлены');
        }
        return view('product.newProduct');
    }
    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        $name = $product->name;
        unlink(public_path($product->photo));
        $product->delete();
        return redirect()->route('getAllByRestaurant',['id' => Auth::user()->restaurant_id])->with('message', 'Your product '.$name.' has been successfully deleted.');
    }
    public function updateProduct(Request $request, $id = null ){
        $product = Product::findOrFail($id);
        if ($request->has('submit')) {
            $data = $request->all();
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->price = $data['price'];
            if($request->file('photo')){
                $photo = $request->file('photo');
                $photo = Controller::upload_image($photo, 'products');
                unlink(public_path($product->photo));
                $product->photo = $photo;
            };
            $product->save();
            return redirect()->route('getAllByRestaurant',['id' => Auth::user()->restaurant_id])->with('message', 'Your product '.$data['name'].' has been successfully updated.');
        }
        return view('product.updateProduct', [
            'id' => $id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'photo' => $product->photo,
        ]);
    }
}
