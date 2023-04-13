<?php

namespace App\Http\Controllers\relations;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\phone;
use App\Models\services;
use App\Models\User;
use Illuminate\Http\Request;

class Onerelationcontroller extends Controller
{
    public function getalldata(){
        $user=User::select('id','name','password')->with(['phone'=>function($q){
            $q->select('code','phone','user_id');//don't forget foreignKey is user_id
        }])->find(9);
        // return $user->phone->code;

        
        return  response()->json($user);
    }
    public function getalldatareverse(){
        $phone=phone::with(['user'=>function($q){//[relations:user]=>return all data from phone model by using function user
            $q->select('id','mobile','name','password');
        }])->find(3);
        $phone->makeVisible(['user_id']);
        //$phone->makeHidden(['code']);


        // return $user->phone->code;

        
        return  $phone;
    }
    public function getalldataforuserhasphone(){
        return User::whereHas('phone')->with('phone')->get();
        /* public function getalldateforuserhasphoneifcondition(){
         return User::whereHas('phone'function($n){$n->where('code','06')})->with('phone')->get();
    }*/
    }
    public function getalldataforuserhasnotphone(){
        return User::whereDoesntHave('phone')->with('phone')->get();
    }
    //+++++++++++++ one to many ++++++++++++++
    public function getdoctorhospital(){
        $hospital= Hospital::with(relations:'doctors')->find(1);
        $doctors= $hospital->doctors; //--------> return data doctors in hospital
        //return $hospital;
        foreach($doctors as $doctor){
            echo $doctor->name."<br>";

        }
        $doctor = Doctor::with(relations:'hospital')->find(2);
        echo  $doctor->hospital->name;

    }
    public function hospitals(){
        $hospitals=Hospital::select('id','name','address')->get();
        return view('doctors.hospitals',compact('hospitals'));
    }
    public function doctors($hospital_id){
        $hospitals= Hospital::find($hospital_id);
        $doctors = $hospitals-> doctors;
        return view('doctors.doctors',compact('doctors'));
    }
    public function hospitalshasdoctor(){
        $hos= Hospital::whereHas('doctors')->get();
        return $hos;
    }
    public function hospitalshasnotdoctor(){
        $hos= Hospital::whereDoesntHave('doctors')->get();
        return $hos;
    }
    public function deletehospitals($hospital_id)
    {
        $hospital = Hospital::find($hospital_id);
        if (!$hospital)
            return abort('404');
        //delete doctors in this hospital
        $hospital->doctors()->delete();
        $hospital->delete();

        return redirect() -> route('hospital.all');
    }
    
    public function getDoctorServices()
    {
        return $doctor = Doctor::with('services')->find(3);
         

        //  return $doctor -> services;
    }
    public function getServiceDoctors()
    {
        return $doctors = services::with(['doctors' => function ($q) {
            $q->select('doctors.id', 'name', 'title');
        }])->find(1);
    } 
    public function getDoctorServicesByid($doctor_id){
        $doctors=Doctor::find($doctor_id);
        $services=$doctors->services->sortBy('id');
        $doctors=Doctor::select('id','name')->get()->sortBy('id');
        $allServices=services::select('id','name')->get()->sortBy('id');
        return view('doctors.services',compact('services','doctors','allServices'));    
    }
    public function saveservicestodoctor(Request $request){
        $doctor = Doctor::find($request->doctor_id);
        if (!$doctor){
            return abort('404');
        }
        // $doctor ->services()-> attach($request -> servicesIds);  // many to many insert to database without check data are they exist or not
      //  $doctor ->services()-> sync($request -> servicesIds);//=>ديه لو عايز امسح القديم في الداتا بيز واحط الجديد
        $doctor->services()->syncWithoutDetaching($request->servicesIds);//=>ديه لو مش عايز امسح القديم في الداتا بيز واحط الجديد
        return 'success';
    

    }
    public function getpatientdoctor(){
        
        $patient = Patient::find(2);
        return $patient->doctor;
    }
    public function getcountrydoctor(){
    // $country = Countries::with('doctors')->find(1);
      $country = Countries::find(1);
      return  $country->doctors;
    }
    public function getcountryhospital(){
        $country=Countries::with(relations:'hospitals')->find(1);
        return $country;
    }
    public function getdoctors(){
       $doctors=  Doctor::select('id','name','genders')->get();
       /*
       if(isset($doctors)){
        foreach($doctors as $doctor){
            $doctor->genders =$doctor->genders == 1 ? 'female':'male';
        }
       }*/
       return $doctors;

    }

}
