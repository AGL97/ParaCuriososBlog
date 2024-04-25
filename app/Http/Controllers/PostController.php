<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Card;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CardRequest;
use Illuminate\Validation\Rules\File;

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
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'title'=>['required','max:40','min:5'],
            'description' =>['required','min:20'],
            'imageRoute' =>['required',File::image()->max('10mb')],
            'category'=>['required','min:4']
        ]);
        $filename= time() . '.' . $request->imageRoute->extension();        

        $request->imageRoute->storeAs('public/images',$filename);

        Card::create([
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => substr($request->description,0, strlen($request->description)*0.3),
            'imageRoute' => $filename,
            'category' => $request->category,
            'user_id' => auth()->user()->id
        ]);

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
