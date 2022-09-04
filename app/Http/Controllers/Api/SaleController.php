<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\CreateRequest;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index()
    {
        return Sale::all();
    }

    public function show($id)
    {
        $sale = Sale::find($id);

        if(!$sale)
            return response([
                'message' => "Id $id Not Found"
            ], 404);

        return response($sale);
    }

    public function store(CreateRequest $request)
    {
        $request->validated();
        Sale::create($request->all());
    }
}
