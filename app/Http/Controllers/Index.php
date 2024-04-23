<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

use function Laravel\Prompts\search;

class Index extends Controller
{
  public function index():View{
    $card = Card::first();
    $cards = Card::all();

    return view('index',[
      'card' => $card,
      'cards' => $cards
    ]);
  }

  public function filter(string $choice = ''): View
  {

    switch ($choice) {
      case 'Paisaje':
        $cards = Card::where('category','LIKE',$choice)->get();
      break;
      case 'Astronomia':
        $cards = Card::where('category','LIKE',$choice)->get();                
        break;
      case 'Anime':
          $cards = Card::where('category','LIKE',$choice)->get();
          break;
      case 'Arte':
          $cards = Card::where('category','LIKE',$choice)->get();
          break;            
      default:
          $cards = Card::all();
          break;
    } 
    return view('index',[
      'cards' => $cards,
    ]);
  }  

  public function search(Request $request):View
  {   
    $search  = $request->query('search');
    $cards = Card::where('title','LIKE','%' . $search . '%')->orwhere('description','LIKE','%' . $search . '%')->orwhere('category','LIKE','%' . $search . '%')->get();
    return view('index',[
      'cards' => $cards,
    ]);
  }
    
    
}
