<?php

use App\Http\Controllers\Ajexpostcontroller;
use App\Http\Controllers\Auth\Customauth;
use App\Http\Controllers\collectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Floder1\Welcomecontroller;
use App\Http\Controllers\Floder1\Add;
use App\Http\Controllers\username;
use App\Http\Controllers\Fristcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\relations\Onerelationcontroller;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Middleware;

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

Route::get('/', function () {
    $data=[];
    $data['hh']="heiufueih";
    $data['uu']="uudjkld";
    return view('welcome',$data);//->with(["hh"=>"hasam","uu"=>"udjskj"]);
});
//unrequiered parameter
Route::get('/about-me/{idy?}',function(){
    return view("about");
})->name('ab');
//view (url,view, array of data)
Route::view('/contact-me','contact',[
  'page_name'=>'contact',
  'page_job'=>'print contact home page'

]);
//requiered parameter
Route::get('category/{id}', function ($id) {
   /* $name = request('name');
    return $name;*/
    $cat=[
        '1'=>'cs',
        '2'=>'it',
        '3'=>'is'
    ];
    return view("category",['the_id'=>$cat[$id]??"this category is not found"]);
    //return view('category');
})->name('cat');

Route::namespace('Floder1')->group(function(){


//all route only access controller or methods in folder name mo

Route::get('/users', [Add::class, 'add']);



});

//Route::get('/users', [Welcomecontroller::class, 'showall']);
Route::get('/user', [username::class, 'show']);
Route::controller(Welcomecontroller::class)->group(function () {
    Route::get('/users/{id}', 'showall');
   
});
Route::get('/check',function(){
   return'middleware';
})->Middleware('auth');
Route::group(['prefix'=>'ww','middleware'=>'auth'],function(){
    Route::get('/', function () {
        return 'hahahahah';
    });
   Route::get('show', [username::class, 'show']);
   Route::get('add0', [Add::class, 'add0']);

   Route::get('print', [Welcomecontroller::class, 'showall']);


});
Route::get('add', [Add::class, 'add']);
Route::get('add1', [Add::class, 'add1']);
Route::get('add2', [Add::class, 'add2']);
Route::get('login',function(){
    return 'this is login page';
})->name('login');
Route::resource('/frist',Fristcontroller::class);
Route::get('getshow', [Welcomecontroller::class, 'getshow']);
Route::get('/landing', function () {
 
    return view('landing');
});
Route::get('host',function(){
    return view('host');
});
Route::group(['prefix'=>'post'],function(){
    Route::get('get',[Postcontroller::class,'getpost']);
  //  Route::get('store',[Postcontroller::class,'storepost']);
    Route::get('create',[Postcontroller::class,'createpost']);
    Route::post('store',[Postcontroller::class,'storepost'])->name('store');
    Route::get('edit/{id}',[Postcontroller::class,'editpost']);
    Route::post('update/{id}',[Postcontroller::class,'updatepost'])->name('updatepost');
    Route::get('delete/{id}',[Postcontroller::class,'deletepost'])->name('deletepost');
    Route::get('all',[Postcontroller::class,'getallpost'] )->name('post.postall');
    Route::get('allNulluser_id',[Postcontroller::class,'getallnulluser_id']);
    
});
Route::get('youtube',[username::class,'getvideo']);
##################begin ajex #####################
Route::group(['prefix'=>'ajexpost'],function(){
    Route::get('create',[Ajexpostcontroller::class,'createajexpost']);
    Route::post('store',[Ajexpostcontroller::class,'storeajexpost'])->name('storeajex');

});
#################end ajex ###########################


//{----------- Atuhentication and guards --------------}
Route::group(['middleware'=>'Customauth'],function(){
Route::get('adult',[Customauth::class,'adult'])->name('adult');
});
Route::get('/notadult',function(){
    return ' you are not adult';
})->name('notadult');
Route::get('site',[Customauth::class,'site'])->middleware('auth:web')->name('site');
Route::get('admin',[Customauth::class,'admin'])->middleware('auth:admin')->name('admin');
Route::get('admin/login',[Customauth::class,'adminlogin'])->name('admin.login');
Route::post('admin/login',[Customauth::class,'checkadminlogin'])->name('save,admin.login');

////{----------- End Atuhentication and guards --------------}




//{-------------start relationships-------------}

//one to one
Route::get('onerelation',[Onerelationcontroller::class,'getalldata']);
Route::get('onerelationreverse',[Onerelationcontroller::class,'getalldatareverse']);
Route::get('onerelationhasphone',[Onerelationcontroller::class,'getalldataforuserhasphone']);
Route::get('onerelationhasnotphone',[Onerelationcontroller::class,'getalldataforuserhasnotphone']);
######################## one to many ##########################
Route::get('hospitalhasmanyrelation',[Onerelationcontroller::class,'getdoctorhospital']);
Route::get('countryhasmanyrelation',[Onerelationcontroller::class,'getcountryhospital']);
Route::get('hospitals',[Onerelationcontroller::class,'hospitals'])->name('hospital.all');
Route::get('hospitals/{hospital_id}',[Onerelationcontroller::class,'deletehospitals'])->name('hospital.delete');
Route::get('doctors/{hospital_id}',[Onerelationcontroller::class,'doctors'])->name('hospital.doctors');
Route::get('hospitals_has_doctor',[Onerelationcontroller::class,'hospitalshasdoctor']);
Route::get('hospitals_has_not_doctor',[Onerelationcontroller::class,'hospitalshasnotdoctor']);
######################### many to many ################################
Route::get('doctors-services',[Onerelationcontroller::class,'getDoctorServices']);
Route::get('services-doctors',[Onerelationcontroller::class,'getServiceDoctors']);
Route::get('doctors/services/{doctor_id}',[Onerelationcontroller::class,'getDoctorServicesByid'])->name('doctors.services');
Route::post('saveservices-to-doctor',[Onerelationcontroller::class,'saveservicestodoctor'])->name('save.doctors.services');
######################### has-(one)or(many)-through ##############################
Route::get('has-one-through',[Onerelationcontroller::class,'getpatientdoctor']);
Route::get('has-many-through',[Onerelationcontroller::class,'getcountrydoctor']);




//{-------------end relationships-------------}



//{---------accessors and mutators------------}
Route::get('accessors',[Onerelationcontroller::class,'getdoctors']);

#####################################- collection -####################################
Route::get('collection1',[collectionController::class,'index']);
Route::get('collection2',[collectionController::class,'collectiondatabase']);
Route::get('collection3',[collectionController::class,'collectionfillter']);
Route::get('collection4',[collectionController::class,'collectiontransform']);
#####################################- end collection -##############################
Route::get('welcome',function(){
    return view('welcomepage');
});





Auth::routes();//(['verify'=> true])

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//middleware('verified')
Route::get('youtube',[username::class,'getvideo']);

