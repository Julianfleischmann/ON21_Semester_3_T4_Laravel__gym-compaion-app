<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'repetition',
        'user_id'
    ];

//    protected static function booted()
//    {
//        static::creating(function ($fillable) {
//            $fillable->user_id = Auth::id();
//        });
//    }


    public function getUser() {
        return $this->belongsTo(User::class, 'user_id');
    }

}


