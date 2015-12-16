<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'title',
        'url',
        'description',
        'category',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopePersonalize()
    {
        if (Auth::check()) {
            return self::where('user_id', Auth::user()->id);
        }
    }
}
