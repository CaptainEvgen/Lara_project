<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Validator;
use App\Http\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }

    public function saveProductData($data){
        $validated = Validator::make($data, [
            'name' => 'required',
            'description' => 'string|max:64|nullable',
            'price'=> 'required|integer',
            'photo' => 'required|image:jpg, jpeg, png'
        ])->validate();

        return $this->productRepository->save($validated);
    }

    public function updateProductData($data, $id)
    {
        $validated = Validator::make($data, [
            'description' => 'string|max:64|nullable',
            'price'=> 'integer',
            'photo' => 'image:jpg, jpeg, png'
        ]);

        return $this->productRepository->update($data, $id);
    }

    public function getRandomProduct($paginate = 100)
    {
        return $this->productRepository->getAll()->paginate($paginate);
    }

    public function getOneById($id)
    {
        return $this->productRepository->getOne($id);
    }

    public function deleteById($id)
    {
        return $this->productRepository->delete($id);
    }
}
