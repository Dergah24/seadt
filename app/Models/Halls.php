<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halls extends Model
{
    use HasFactory;
     protected  $fillable = ['content_az','content_en','content_ru','title_az','title_en','title_ru','image','user_id'];

     public function innerHall()
     {

         return $this->hasMany(innerHall::class)->whereDeleted(0)->whereStatus(1);
     }
}
