<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use League\CommonMark\Extension\CommonMark\Node\Block\ListData;
use Symfony\Component\HttpFoundation\RedirectResponse;

use function Laravel\Prompts\search;
use function Laravel\Prompts\select;

class Index extends Controller
{
  private array $filteredTags = []; 

  public function index():View{
    $card = Card::first();
    $cards = Card::all();
    
    $this->uniqueTags();
    return view('index',[
      'card' => $card,
      'cards' => $cards,
      'tags' => $this->filteredTags
    ]);
  }

  public function filter(string $choice = ''): View
  {
    $card = Card::where('category','LIKE',$choice)->get()->first();
    $cards = Card::where('category','LIKE',$choice)->get();
    $this->uniqueTags();

    return view('index',[
      'card' => $card,
      'cards' => $cards,
      'tags' => $this->filteredTags
    ]);
  }  

  public function search(Request $request):View
  {   
    $search  = $request->query('search');
    $this->uniqueTags();
    $card = Card::where('title','LIKE','%' . $search . '%')->orwhere('description','LIKE','%' . $search . '%')->orwhere('category','LIKE','%' . $search . '%')->get()->first();
    $cards = Card::where('title','LIKE','%' . $search . '%')->orwhere('description','LIKE','%' . $search . '%')->orwhere('category','LIKE','%' . $search . '%')->get();
    
    return view('index',[
      'card' => $card,
      'cards' => $cards,
      'tags' => $this->filteredTags
    ]);
  }

  private function uniqueTags():void
  {
    $tags = DB::table('cards')->select('category')->get()->toArray(); 
      foreach($tags as $key => $value) {
        foreach ($value as $key2 => $value2) {
          if(!in_array($value2,$this->filteredTags))
          {
            $this->filteredTags[$key] = $value2;
          }        
        }
      }
  }
  
    
    
}
