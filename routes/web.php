<?php

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
use App\Admin;


Route::get('/', function () {
    $a = Admin::all()->last();
    // return $a;
    return view('vote',compact('a'));
});

Route::get('/voting', function () {
    return view('voting');
});




Route::post('/', 'VoteController@check');
// Route::get('/voting/{code}/start', 'VoteController@vote');



//VOTE FINANCE
Route::get('/start/{code}', 'VoteController@f');

//VOTE OTHERS
Route::get('/{code}/{next}', 'VoteController@others');

// The vote increment
Route::get('/{post}/{ucid}/{next}/{code}', 'VoteController@voting');



// ADMIN CONTROL
Route::get('/damara', 'VoteController@admin');
Route::get('/damara', 'VoteController@pin');


Route::get('/site/{id}/working', 'VoteController@sties' );
Route::get('/result', 'VoteController@result' );


