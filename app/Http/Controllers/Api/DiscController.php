<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Disc\CreateRequest;
use App\Http\Requests\Disc\UpdateRequest;
use App\Models\Disc;

class DiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Disc::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $request->validated();
        Disc::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $disc = Disc::find($id);
        
        if(!$disc)
            return response([
                'message' => "Id $id Not Found"
            ], 404);

        return response($disc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $amount = $request->safe()->only(['amount']);

        $disc = Disc::find($id);
        
        if(!$disc)
            return response([
                'message' => "Id $id Not Found"
            ], 404);

        $disc->update($amount);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disc = Disc::find($id);
        
        if(!$disc)
            return response([
                'message' => "Id $id Not Found"
            ], 404);

        $disc->delete();
    }
}
