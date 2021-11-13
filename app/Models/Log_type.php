<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_az', 'title_ru', 'title_en'
    ];
}
