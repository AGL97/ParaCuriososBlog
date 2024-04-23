<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Http\Resources\ApiCardResource;
use App\Models\Card;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        return ApiCardResource::collection(Card::all());
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(CardRequest $request):JsonResponse
    {
        $card = Card::create($request->all());
        return response()->json(
            [
                'success'=>true,
                'data'=>new ApiCardResource($card)
            ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id):JsonResponse
    {
        return response()->json([
            "success"=>true,
            "data"=>new ApiCardResource(Card::find($id)),
        ],200);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(CardRequest $request, int $id):JsonResponse
    {
        return response()->json([
            "success"=>true,
            "data"=>new ApiCardResource(Card::find($id)->update($request->all()))
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id):JsonResponse
    {
        Card::find($id)->delete();
        return response()->json(['success'=>true],200);        
    }
}
