<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'title_fr',
        'body_fr',
        'user_id',
        
    ];



    public function articleHasUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }


}