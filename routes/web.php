<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\About;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Contact;
use App\Http\Controllers\Index;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

Route::get('/',[Index::class,'index'])->name('index');
Route::get('/category/{choice}/',[Index::class,'filter'])->name('index.filter');

Route::get('/search',[Index::class,'search'])->name('index.search');
Route::get('/about',[About::class,'displayView'])->name('about');
Route::get('/contact',[Contact::class,'displayView'])->name('contact');
Route::resource('/post',PostController::class);

Route::group(['middleware' => ['guest']],function() {
  Route::get('/login',[LoginController::class,'login'])->name('login');
  Route::post('/verify', [LoginController::class,'verify'])->name('user.verify');
});

Route::group(['middleware' => ['auth']],function(){
  Route::get('logout',function (){
    Auth::logout();
    return redirect("/");
  })->name('logout');

  Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});









