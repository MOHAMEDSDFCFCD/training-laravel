<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class collectionController extends Controller
{
    public function index(){
        /*
        $numbers =[1,2,3,3,4,5,6,6];
        $col = collect($numbers);
        return $col->avg();*/

        //return $col;

        /*
         $var1='mohamed';
         $var2=23;
         $data1= ['name','age'];
         $col = collect($data1);
         $res=$col->combine([$var1,$var2]);
         return $res;*/

         /*
         $ages =collect([2,3,3,1,2,334,2,75,555,75,334]);
         echo "<pre>";
         print_r($ages->duplicates());
         echo "</pre>";
         return $ages->count();
         return $ages->countBy();*/


         //each






    }
     
    public function collectiondatabase(){
        $posts = post::get();
        //remove
        $posts->each(function($post){
            if($post->id == 52){
                unset($post ->body);
                unset($post ->user_id);

            }
            unset($post ->title);
            //add
            $post->price = 25;
            return $post;
        });
        return $posts;

    }
    public function collectionfillter(){
     
        $posts = post::get();
        $posts = collect($posts);
      $resultoffilter=  $posts->filter(function($value,$key){
         $body='this is post 18';
            return $value['body'] == $body;

        });
        return array_values( $resultoffilter->all());

    }
    public function collectiontransform(){
        $posts = post::get();
        $posts = collect($posts);
        $resultoftransform=  $posts->transform(function($value,$key){
            /*
            $data=[];
            $data['body']=$value['body'];
            $data['age']=90;
            return $data;
            
            
            */ 
         $body='this is post 18';
            return 'the body:'. $value['body'];

        });
        return  $resultoftransform;

    }
}
