<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use function Psy\debug;

class AdminController extends Controller
{
  public function index(): View
  {
    $cards = Card::all();
    return view('admin.index',compact('cards'));
  }
}
