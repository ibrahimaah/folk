<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Models\StoreSale;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreSaleController extends Controller
{
    public function store(StoreSaleRequest $request): JsonResponse
    {
        $storeSale = StoreSale::create($request->validated());

        return response()->json([
            'message' => 'Store sale request submitted successfully.',
            'data' => $storeSale
        ], 201);
    }
}
