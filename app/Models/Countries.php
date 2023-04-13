<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;
    protected $table='countries';
    protected $fillable=['id','name'];
    public $timestamps=false;
    public function doctors(){
        return $this->hasManyThrough(related:'App\Models\Doctor',through:'App\Models\Hospital',firstKey:'country_id',secondKey:'hospital_id',localKey:'id',secondLocalKey:'id');
      }
      public function hospitals(){
        return $this->hasMany(related:'App\Models\Hospital',foreignKey:'country_id',localKey:'id');
      }
}
