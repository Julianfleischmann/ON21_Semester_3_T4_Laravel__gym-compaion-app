<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_weight',
        'training_redo',
        'training_user_id'
    ];

//    protected static function booted()
//    {
//        static::creating(function ($fillable) {
//            $fillable->training_user_id = Auth::id();
//        });
//    }
}


