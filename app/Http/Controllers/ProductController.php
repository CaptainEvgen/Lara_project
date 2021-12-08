<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\ProductService;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }

    public function getByRestaurant($id)
    {
        $products = Product::where('restaurant_id', $id)->get();
        $restaurant = Restaurant::findOrFail($id);

        return view('product.getByRestaurant', [
            'products' => $products,
            'restaurant' => $restaurant,
        ]);
    }

    public function deleteProduct($id)
    {

        $result['status'] = 200;

        try {
            $result['data'] = $this->productService->deleteById($id);

        } catch (ValidationException $e) {
            $result = [
                'status' => 500,
                'message' =>$e->getMessage(),
                'errors' =>$e->errors(),
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function randomIndexPaginate()
    {
        $products = $this->productService->getRandomProduct(50);

        return view('product.getAllProducts', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('product.newProduct');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $result['status'] = 200;

        try {
            $result['data'] = $this->productService->saveProductData($data);
        } catch (ValidationException $e) {
            $result = [
                'status' => 500,
                'message' =>$e->getMessage(),
                'errors' =>$e->errors(),

            ];
        }
        return response()->json($result, $result['status']);
    }

    public function show($id)
    {
        $product = $this->productService->getOneById($id);
        $restaurant =  $product->restaurant;

        return view('product.getOneProduct', [
            'name' => $product->name,
            'description' =>$product->description,
            'price' =>$product->price,
            'photo' =>$product->photo,
            'restaurant' =>$restaurant,
        ]);
    }

    public function edit($id)
    {
        $product = $this->productService->getOneById($id);
        return view('product.updateProduct', [
            'id' => $id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'photo' => $product->photo,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $result['status'] = 200;

        try {
            $result['data'] = $this->productService->updateProductData($data, $id);

        } catch (ValidationException $e) {
            $result = [
                'status' => 500,
                'message' =>$e->getMessage(),
                'errors' =>$e->errors(),
            ];
        }
        return response()->json($result, $result['status']);

    }

}
