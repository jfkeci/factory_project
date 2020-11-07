<?php

use Illuminate\Support\Facades\Route;
use App\Models\Sastojak;
use App\Models\Jelo;
use App\Models\Kategorija;


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
Route::get('/about', 'App\Http\Controllers\PagesController@about');

Route::resource('jela', 'App\Http\Controllers\JelaController');
Route::resource('sastojci', 'App\Http\Controllers\SastojciController');
Route::resource('kategorije', 'App\Http\Controllers\kategorijeController');
Auth::routes();

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

Route::get('/test', function(){
    /* $sastojak = Sastojak::find(32);
    $jelo = Jelo::find(20);
    $jelo->sastojci()->attach($sastojak->id); */
    $sastojak = Sastojak::find(32);
    $jela = Jelo::all();
    $jela_id = $sastojak->jela();
    $arr = [];
    foreach($jela_id as $id){
        foreach($jela as $jelo){
            if($id == $jelo->id){
                array_push($arr, $jelo);
            }
        }
    }
    dd($arr);
});
