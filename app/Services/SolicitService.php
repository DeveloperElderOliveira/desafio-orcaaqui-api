<?php
namespace App\Services;

use App\Models\Solicit;

class SolicitService {

    private $repository;

    public function __construct(Solicit $solicit)
    {
        $this->repository = $solicit;
    }

    public function index(){
        $solicits = $this->repository->with(['products'])->get();
        return $solicits;
    }

    public function store($content){
        
        $solicit = $this->repository->create($content);
        $solicit->products()->attach($content['produtos']);
        return $solicit;
    }
}