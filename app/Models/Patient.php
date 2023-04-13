<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table='patients';
    protected $fillable=['id','name','age'];
    protected $hidden=['created_at','updated_at'];
    public $timestamps=false;

    //has one through 
    public function doctor(){
        return $this->hasOneThrough(related:'App\Models\Doctor',through:'App\Models\Madical',firstKey:'patient_id',secondKey:'medical_id',localKey:'id',secondLocalKey:'id');

    }
}
