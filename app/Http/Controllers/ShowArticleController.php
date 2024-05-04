<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowArticleController extends Controller
{
    public function show(int $id):View
    {
        $card = Card::find($id);
        return view('show',compact('card'));
    }
}
