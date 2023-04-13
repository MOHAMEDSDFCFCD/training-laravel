<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $fillable=['id','name','created_at','updated_at'];
    protected $hidden =['created_at','updated_at','pivot'];
    public $timestamps = true;


    public function doctors(){
        return $this -> belongsToMany(related:'App\Models\Doctor',table:'doctor_service',foreignPivotKey:'service_id',relatedPivotKey:'doctor_id',parentKey:'id',relatedKey:'id');
    }
    
}
