<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CardRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {        
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CardRequest $request):RedirectResponse
    {
        Card::create($request->all());
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id):View
    {
        $card = Card::find($id);
        return view('show',compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id):View
    {
        $card = Card::find($id);
        return view('edit',compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CardRequest $request,int $id):RedirectResponse
    {        
        Card::find($id)->update($request->all());
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id):RedirectResponse
    {
        Card::destroy($id);
        return redirect()->route('index');
    }
}