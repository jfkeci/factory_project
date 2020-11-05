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

Route::get('/', 'App\Http\Controllers\PagesController@index');
Route::get('/sastojci', 'App\Http\Controllers\PagesController@sastojci');
Route::get('/about', 'App\Http\Controllers\PagesController@about');

Route::resource('jela', 'App\Http\Controllers\JelaController');
Auth::routes();

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

Route::get('/test', function(){
    /* \App\Models\Sastojak::create([
        'naziv' => 'sol'
    ]);
    \App\Models\Sastojak::create([
        'naziv' => 'papar'
    ]);
    \App\Models\Sastojak::create([
        'naziv' => 'vegeta'
    ]); */
    $sastojak = \App\Models\Sastojak::first();
    $jelo = \App\Models\Jelo::first();
    //$jelo->sastojci()->attach($sastojak->id); //jelo sa sastojkom u tablicu jela_sastojci
    $jelo->sastojci()->attach([5,4]);
    //dd($jelo);


});
