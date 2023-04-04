<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_fr',
        'title_en',
        'date',
        'user_id',
        'file',
    ];

    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'fr' ? $this->title_fr : $this->title_en;
    }
    public function documentHasUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}