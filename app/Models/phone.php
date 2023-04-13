<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    use HasFactory;
    protected $table='phones';
    protected $fillable=['id','user_id','code','phone'];
    protected $hidden=['user_id'];
    public $timestamps=false;
       #############-begin relations-#############
       public function user(){
        return $this->belongsTo(related:'App\Models\User',foreignKey:'user_id');
    } 
      #############-end relations-#############
}
