<?php

namespace App\Http\Controllers;

use App\Http\Requests\Postrequest;
use App\Models\post;
use App\traits\posttrait;
use Illuminate\Http\Request;

class Ajexpostcontroller extends Controller
{
    use posttrait;
    public function createajexpost(){
      return view('ajexpost.createajex');
    }
    public function storeajexpost(Postrequest $request){
        
      
    
        //save offer into DB using AJAX
        if($request->has('photo')){

        $file_name = $this->savephoto(path:'images/post',image:$request->photo);
        }
        //insert  table offers in database
        $post = post::create([
            ['photo'=>$file_name,
            'posts_id'=>$request->posts_id,
           'title'=>$request->title,
           'body'=>$request->body]
        

        ]);

        if ($post)
            return response()->json([
                'status' => true,
                'msg' => 'successfully stor',
            ]);

        else
            return response()->json([
                'status' => false,
                'msg' => 'fail store plaese try again',
            ]);
    }

    }

