<?php

namespace App\Services;

use App\Models\Log;

class LogService
{

    public function index(){
        
        return Log::orderByDesc('created_at')->limit(10)->get();
    }

    public function store($data){

        return Log::create($data);
    }
}