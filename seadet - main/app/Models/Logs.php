<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    protected $fillable = [
        'content', 'log_type_id'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function types()
    {
        return $this->hasOne('App\Models\Log_type', 'id', 'log_type_id');
    }
}
