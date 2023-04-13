<?php
namespace App\traits;



Trait posttrait {
    public function savephoto($path,$image){
        
            
            $file_extension=strtolower($image->extension());//get lowercase .png .jpg .jpeg
            $file_name=time().'.'.$file_extension;
          //  $path='images/post';
            $image->move($path,$file_name);
            return $file_name;
        

    }

}






?>