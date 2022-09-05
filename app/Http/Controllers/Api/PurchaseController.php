<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchase\CreateRequest;
use App\Models\Purchase;
use App\Services\CheckPurchase;

class PurchaseController extends Controller
{
    public function index()
    {
        return Purchase::all();
    }

    public function show($id)
    {
        $purchase = Purchase::find($id);

        if(!$purchase)
            return response([
                'message' => "Id $id Not Found"
            ], 404);

        return response($purchase);
    }

    public function store(CreateRequest $request)
    {
        $request->validated();

        return Purchase::create($request->all());
    }
}
