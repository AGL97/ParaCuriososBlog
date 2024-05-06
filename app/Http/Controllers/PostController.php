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
        $filename = time() . '.' . $request->imageRoute->extension();        

        $request->imageRoute->storeAs('public/images',$filename);

        $short_description = strlen($request->description) >= 35 ? substr($request->description,0,strpos($request->description,' ',35)) . "..." : $request->description; //Devuelve una peque;a descripcion de la proporcionada por el usuario. Encuentra la primera ocurrencia de un espacio en blanco luego del caracter numero 30.

        Card::create([
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $short_description,
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
    public function update(Request $request,int $id):RedirectResponse
    {        
        $request->validate([
            'title'=>['required','max:40','min:5'],
            'description' =>['required','min:20'],
            'imageRoute' =>['nullable',File::image()->max('1mb')],
            'category'=>['required','min:4']
        ]);        
        

        $short_description = strlen($request->description) >= 35 ? substr($request->description,0,strpos($request->description,' ',35)) . "..." : $request->description;
        $card = Card::find($id);
        $card->update([
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $short_description,            
            'category' => $request->category,
            'user_id' => auth()->user()->id
        ]);
        if($request->hasFile('imageRoute')){
            $filename = time() . '.' . $request->imageRoute->extension();      
            $request->imageRoute->storeAs('public/images',$filename);
            $card->update(['imageRoute' => $filename]);
        }
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
