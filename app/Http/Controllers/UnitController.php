<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Exception;

class UnitController extends Controller
{
    private $unit;

    public function __construct(Unit $unit)
    {
        $this->middleware('auth:api');
        $this->unit = $unit;
    }

    public function index()
    {
        try{
            $units = $this->unit->all();
            return response()->json(['unidades' => $units]);
        }catch(Exception $e){
            return response()->json(["error" => $e->getMessage(),401]); 
        }      
    }

}
