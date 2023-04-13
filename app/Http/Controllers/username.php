<?php

namespace App\Http\Controllers;

use App\Events\Videoviewer;
use App\Models\video;
use App\Models\User;


use Illuminate\Routing\Controller as BaseController;

class username extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){
        return'mohamed ali';
    }
    public function getvideo(){
       $video= video::first();
       event(new Videoviewer($video));//fire event
        return view('youtube')->with('youtube'//variable go to view and vlaue is $video
        ,$video);
    }
}
