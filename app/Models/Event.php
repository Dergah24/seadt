<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected  $fillable = ['content_az', 'content_en', 'content_ru', 'title_az', 'title_en', 'title_ru', 'image', 'user_id'];

    public function innerEven()
    {
        return $this->hasMany(innerEvent::class)->where('deleted',0)->whereStatus(1);
    }
}
