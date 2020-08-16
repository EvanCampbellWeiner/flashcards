<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/1/testdata', function(){
    return view('test');
});

Route::get('/set/json/{userid}/{setid}', function($id, $setid){
    $cards = DB::table('flashcards')->where('setID', $setid)->get();
    $collection = collect($cards);
    $collection = $collection->shuffle();
    
    return json_encode($collection);  
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('set','SetController');
Route::resource('flashcard','FlashcardController');
Route::get('/set/{set}/flashcard','FlashcardController@index');