<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\About;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Contact;
use App\Http\Controllers\Index;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowArticleController;
use App\Http\Controllers\TelegramController;
use App\Http\Middleware\Language;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;


Route::get('/',[Index::class,'index'])->name('index');
Route::get('/category/{choice}/',[Index::class,'filter'])->name('index.filter');

Route::get('/search',[Index::class,'search'])->name('index.search');
Route::get('/about',[About::class,'displayView'])->name('about');
Route::get('/contact',[Contact::class,'displayView'])->name('contact');
Route::get('/article/show/{id}',[ShowArticleController::class,'show'])->name('article.show');

Route::group(['middleware' => ['guest']],function() {
  Route::get('/login',[LoginController::class,'login'])->name('login');
  Route::post('/verify', [LoginController::class,'verify'])->name('user.verify');
});

Route::group(['middleware' => ['auth']],function(){
  Route::get('logout',function (){
    Auth::logout();
    return redirect("/");
  })->name('logout');

  Route::resource('/post',PostController::class);
  Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});

Route::get('lang/{lang}',[LanguageController::class,'switchLang'])->name('lang');

Route::get('/ajax/cards/{index}',[Index::class,'getSmallCards'])->name('get.small.cards');
Route::get('/ajax/all/',[Index::class,'getAllCards'])->name('get.all.cards');

Route::get('/pdf/download/{id}',[PdfController::class,'generatePDF'])->name('download.pdf');

Route::get('/telegram/message/{id}',[TelegramController::class,'sendMessage'])->name('telegram.messagge');

Route::post('/excel/import',[AdminController::class,'importExcel'])->name('admin.import');
Route::get('/excel/export',[AdminController::class,'exportExcel'])->name('admin.export');







