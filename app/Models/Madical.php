<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madical extends Model
{
    use HasFactory;
    protected $table='medicals';
    protected $fillable=['id','pdf','patient_id'];
    protected $hidden=['created_at','updated_at'];
    public $timestamps=false;
}
