<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInterestedRequest;
use App\Models\InterestedBuyer;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InterestedBuyerController extends Controller
{
    public function store(StoreInterestedRequest $request): JsonResponse
    {
        try 
        {
            $inquiry = InterestedBuyer::create($request->validated());

            return response()->json([
                'code' => 1,
                'data' => $inquiry
            ], 201);
        }
        catch(Exception $ex)
        {
            return response()->json(['code' => 0 , 'msg' =>  $ex->getMessage()]);
        }
    }
}
