<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Models\StoreSale;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreSaleController extends Controller
{
    public function store(StoreSaleRequest $request): JsonResponse
    {
        try 
        {
            $storeSale = StoreSale::create($request->validated());

            return response()->json([
                'code' => 1,
                'data' => $storeSale
            ], 201);
        } 
        catch (Exception $ex) 
        {
            return response()->json(['code' => 0, 'msg' =>  $ex->getMessage()]);
        }
    }
}
