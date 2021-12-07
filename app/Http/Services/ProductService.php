<?php

namespace App\Http\Services;


use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

        $result = $this->productRepository->save($validated);

        return $result;
    }

    public function updateProductData($data, $id)
    {
        $validated = Validator::make($data, [
            'description' => 'string|max:64|nullable',
            'price'=> 'integer',
            'photo' => 'image:jpg, jpeg, png'
        ]);

        if ($validated->fails()) {
            throw new InvalidArgumentException($validated->errors()->first());
        }

        DB::beginTransaction();

        try{
            $product = $this->productRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

        }

        DB::commit();

        return $product;
    }

    public function getRandomProduct($paginate = 100)
    {
        return $this->productRepository->getAll()->paginate($paginate);
    }

    public function getOneById($id)
    {
        return $this->productRepository->getOne($id);
    }
}