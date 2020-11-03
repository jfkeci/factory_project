<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $paragraph='welcome to my app';
        return view('pages.index')->with('paragraph', $paragraph);
    }
    public function sastojci(){
        return view('pages.sastojci');
    }
    public function about(){
        return view('pages.about');
    }
}
