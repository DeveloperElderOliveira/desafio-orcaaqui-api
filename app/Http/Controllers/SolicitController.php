<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolicitRequest;
use App\Services\SolicitService;
use Exception;
use Illuminate\Http\Request;

class SolicitController extends Controller
{
    private $service;

    public function __construct(SolicitService $solicitService)
    {
        $this->middleware('auth:api');
        $this->service = $solicitService;
    }
    
    public function index()
    {
        try{
            $solicits = $this->service->index();
            return response()->json(["solicitacoes" => $solicits]);
        }catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function store(SolicitRequest $request)
    {
        try{
            $content = $request->all();
            $solicit = $this->service->store($content);
            return response()->json(['success' => $solicit]);
        }catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

}
