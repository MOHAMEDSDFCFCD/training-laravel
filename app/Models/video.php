<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;
    protected $table='videos';
    protected $fillable=['id','namevideos','countviewer'];
    public $timestamps=false;
}
