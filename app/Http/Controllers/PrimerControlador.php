<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerControlador extends Controller
{
    function index(){
        return view('contact');
    }
    function otro($post = false, $otro = false){
        echo $post;
        echo $otro;
    }
}
