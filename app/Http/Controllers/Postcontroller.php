<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posteditrequest;
use App\Http\Requests\Postrequest;
use App\Models\post;
use App\traits\posttrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Postcontroller extends Controller
{
    use posttrait;
    public function getpost(){
        return post::get();
    }
   /* public function storepost(){
         post::create(['posts_id'=>41,'title'=>'post eleven','body'=>'mohamed ali']);
    }*/
    public function createpost(){
        return view(view:'post.create');
    }
    public function storepost(Postrequest $request){
        //how to validtion data before insert to database
    /*    $rules=[
            'post_id'=>'required|max:100|numeric',
            'title'=>'required|unique:posts,title',
            'body'=>'required'
        
        ];
        $message=[
            'post_id.required'=>trans(key:'you should enter post_id'),
            'title.required'=>trans(key:'you should enter title'),
            'body.required'=>'you should enter body',
            'title.unique'=>'you should anthor title because it used'
        ];
        $validtion =  Validator::make($request->all(),$rules,$message);
         if($validtion->fails()){
            return redirect()->back()->withErrors($validtion)->withInputs($request->all());//->frist()

         }else{*/

        //(------save photo in floder-------)
        if($request->has('photo')){
            /*
            $image=$request->photo;
            $file_extension=strtolower($image->extension());//get lowercase .png .jpg .jpeg
            $file_name=time().'.'.$file_extension;
            $path='images/post';
            $image->move($path,$file_name);*/
          $file_name=$this->savephoto(path:'images/post',image:$request-> photo);
        }
        
        /*
        $file_extension =$request->photo->getClientOriginalExtension();
        $file_name=time().'.'.$file_extension;
        $path='images/post';
        $request->photo->move($path,$file_name);
        return'okey';*/

        //insert to database
        post::create(['photo'=>$file_name,
        'posts_id'=>$request->posts_id,
       'title'=>$request->title,
       'body'=>$request->body]);
        return redirect()->back()->with(['success'=>'successfully store']);
         }
         public function getallpost(){
            $posts=post::select('id','posts_id','title','body','photo')->get()->sortBy('posts_id');//get()-> return data of collection //Limit()
            ####################### paginate of database ##################
            /* return $posts=post::select('id','posts_id','title','body','photo')->paginate(5)->sortBy('posts_id'); */
            return view('post.postall',compact('posts'));
         }
         public function editpost($post_id){
            $search = post::find($post_id);  // search in given table id only
            if (!$search){
                return redirect()->back();
            }
          //->  $search=post::findOrFail($post_id);//->search by posts_id only
         $search = post::select('id','posts_id','title','body','photo')->find($post_id);
            return view('post.edit',compact('search'));
            

         }
         public function deletepost($post_id){
            //check if post exists or not 
            $delpost = post::find($post_id);//anthor method post::where('id','$post_id')->first();  
             // search in given table id only
            if (!$delpost){
                return redirect()->back()->with(['error' => 'post is not exist']);
            }
            $delpost->delete();
            return redirect()->route('post.postall')->with(['success'=>'delete post sucessfully']);  

         }
         public function updatepost(Posteditrequest $request,$post_id//->post_id is taken from form edit.blade.php 
         ){
            //how to validtion data before updata to database
            //check data if it is exsits
            $check = post::find($post_id);  // search in given table id only
            if (!$check){
                return redirect()->back();
            }
            if($request->has('photo')){
                $file_name=$this->savephoto(path:'images/post',image:$request-> photo);
            }
            //update data
                $check->update(['photo'=>$file_name,
                'posts_id'=>$request->posts_id,
                'title'=>$request->title,
                'body'=>$request->body
                ]);

          //  $check->update($request->all());
            //or 
            /* $check->update([
                'post_id(name of form view edit)'=>$request->post_id,
                'title'=>$request->title
            ])*/

          //  return view('post.postall',[['success'=>'successfully store']]);
          return redirect()->back()->with(['success'=>'successfully update']);


         }

       public function getallnulluser_id(){
        return post::nulluser_id()->get();
       }
     
    }

