<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Training;

class CountTrainings extends Controller
{
    public function countTrainings() {
        Auth::check();
        $id = Auth::id();
        $count = Training::where('user_id', $id)->count();

        return $count;
    }
}
