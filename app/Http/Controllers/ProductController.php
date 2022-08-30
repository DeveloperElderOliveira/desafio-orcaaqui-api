<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Exception;

class ProductController extends Controller
{

    private $service;

    public function __construct(ProductService $productService)
    {
        $this->middleware('auth:api');
        $this->service = $productService;
    }
    
    public function index()
    {
        try{
            $products = $this->service->index();
            return response()->json(["produtos" => $products]);
        }catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }

    }

    public function store(ProductRequest $request)
    {
        try{
            $content = $request->all();
            $product = $this->service->store($content);
            return response()->json(['success' => $product]);
        }catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
        
    }

}
