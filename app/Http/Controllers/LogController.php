<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Services\LogService;
use App\Http\Requests\LogPostRequest;

class LogController extends Controller
{

    public LogService $logService;

    public function __construct(LogService $LogService)
    {
        $this->logService = $LogService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['data' => $this->logService->index() ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LogPostRequest $request)
    {
        return response()->json(['data' => $this->logService->store( $request->validated() ) ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(['data' => 'show' ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response()->json(['data' => 'update' ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json(['data' => 'destroy' ]);
    }
}
