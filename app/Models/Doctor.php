<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table='doctors';
    protected $fillable=['id','name','title','genders','hospital_id','medical_id'];
    protected $hidden=['created_at','updated_at','pivot'];
   // public $timestamps=false;
   public function hospital(){
     return $this->belongsTo(related:'App\Models\Hospital',foreignKey:'hospital_id',ownerKey:'id');
   }
   public function services(){
     return $this->belongsToMany(related:'App\Models\services',table:'doctor_service',foreignPivotKey:'doctor_id',relatedPivotKey:'service_id',parentKey:'id',relatedKey:'id');
   }
   ################# -- accessors and mutators -- #################

   //accessors
   public function getgendersAttribute($vajl){

    return $vajl == 1 ?'female':'male';

   }

}
 