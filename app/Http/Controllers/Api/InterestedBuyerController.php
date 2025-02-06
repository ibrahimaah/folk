<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInterestedRequest;
use App\Models\InterestedBuyer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InterestedBuyerController extends Controller
{
    public function store(StoreInterestedRequest $request): JsonResponse
    {
        $inquiry = InterestedBuyer::create($request->validated());

        return response()->json([
            'message' => 'Inquiry stored successfully!',
            'data' => $inquiry
        ], 201);
    }
}
