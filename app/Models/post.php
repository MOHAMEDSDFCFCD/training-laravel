<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $fillable=['id','user_id','title','body','publish_date','posts_id','photo'];
    protected $hidden=['publish_date','created_at','updated_at'];
   // public $timestamps=false;
   ###########################---------  local scope function -----------#########################
   public function scopenulluser_id($query){
    return $query->whereNULL('user_id');
   }
   ###########################------- accessora and mutators ------######################
     //mutators
    public function setTitleAttribute($value){

      $this->attributes['title']=strtoupper($value);
  }
}
