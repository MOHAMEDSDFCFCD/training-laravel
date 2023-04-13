<?php

namespace App\Http\Controllers\Floder1;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class  Welcomecontroller extends Controller
{
    public function showall(){
        echo 89;
        echo "<br>";
        return 'welcome admin and can i help you ?';
    }
    public function add(){
        $y=10;
        echo '<br>';
        return $y+$y;
    }
    public function getshow(){
        $dta=['page_name'=>'contact','page_job'=>'print contact home page'];
        return view('contact',$dta);
    }
}
