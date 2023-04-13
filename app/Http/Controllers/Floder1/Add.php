<?php

namespace App\Http\Controllers\Floder1;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class  Add extends Controller
{ //applies middleware all methods in class Add except add1
    public function __construct()
    {
        $this->middleware('auth')->except(methods:'add1');
    }
    public function add(){
        $y=9;
        echo '<br>';
        return $y+$y;
    }
    public function add0(){
        $y=1;
        echo '<br>';
        return $y+$y;
    }
    public function add1(){
        $y=10;
        echo '<br>';
        return $y+$y;
    }
    public function add2(){
        $y=11;
        echo '<br>';
        return $y+$y;
    }
}