<?php
namespace App\Services;

use App\Models\Product;

class ProductService {

    private $repository;

    public function __construct(Product $product)
    {
        $this->repository = $product;
    }

    public function index(){
        $products = $this->repository->with('category','solicits')->get();
        return $products;
    }

    public function store($content){
        $product = $this->repository->create($content);
        return $product;
    }
}