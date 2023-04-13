<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table='hospitals';
    protected $fillable=['id','name','address','country_id'];
    protected $hidden=['created_at','updated_at'];
   // public $timestamps=false;
   public function doctors(){
    return $this->hasMany(related:'App\Models\Doctor',foreignKey:'hospital_id',localKey:'id');
  }
  public function country(){
    return $this->belongsTo(related:'App\Models\Countries',foreignKey:'country_id',ownerKey:'id');
  }
}
