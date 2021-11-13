<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta_tags_title_description extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $table = 'meta_tags_title_description';
    protected $fillable = ['title', 'description', 'meta_tag'];
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
