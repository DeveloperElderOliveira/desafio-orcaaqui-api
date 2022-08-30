<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->middleware('auth:api');
        $this->category = $category;
    }

    public function index()
    {
        try{
            $category = $this->category->all();
            return response()->json(['unidades' => $category]);
        }catch(Exception $e){
            return response()->json(["error" => $e->getMessage(),401]); 
        }  
    }

}
