<?php

namespace App\Http\Controllers;

use App\Models\Card;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function sendMessage(int $id):RedirectResponse{
        $chat  = TelegraphChat::find(1);
        $card = Card::find($id);               
        $chat->html("Titulo:\n".$card->title)->send();
        $chat->html("Descripcion:\n".$card->description)->send();         
        $chat->photo("storage/images/".$card->imageRoute)->send();
        return redirect()->back();
    }
}
