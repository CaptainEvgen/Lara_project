<?php

namespace App\Http\Repositories;

use App\Models\Product;
use App\Helpers\UploadHelper;
use Illuminate\Support\Facades\Auth;


class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function save($validate)
    {
        $product = new $this->product;
            $product->restaurant_id = Auth::user()->restaurant_id;
            $product->name = $validate['name'];
            $product->description = $validate['description'];
            $product->price = $validate['price'];
            $photo = $validate['photo'];
            $photo = UploadHelper::upload_image($photo, 'products');
            $product->photo =  $photo;
        $product->save();

        return $product->fresh();
    }

    public function update($data, $id)
    {
        $product = $this->product->find($id);
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->price = $data['price'];
        if(isset($data['photo'])){
            $photo = $data['photo'];
            $photo = UploadHelper::upload_image($photo, 'products');
            unlink(public_path($product->photo));
            $product->photo = $photo;
        };
        $product->update();

        return $product;
    }

    public function getAll()
    {
        return Product::inRandomOrder();
    }

    public function getOne($id)
    {
        return Product::findOrFail($id);
    }

    public function delete($id)
    {
        $product = $this->product->findOrFail($id);
        unlink(public_path($product->photo));
        $product->delete();

        return $product;
    }
}
