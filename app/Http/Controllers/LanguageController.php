<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($lang):RedirectResponse{
        if(array_key_exists($lang,Config::get('languages')))
        {
            Session::put('applocale',$lang);
        }
        return Redirect::back();
    }
}
