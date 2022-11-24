<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Training;

/**
 * Diese Klasse dient der abfrage von der anzahl der Trainings und verglicht dies mit dem jeweils eingeloggten User (dessen ID)
 * Wird für den AJAX benutzt
 * Auth::id von https://www.codewall.co.uk/how-to-get-current-user-id-in-laravel/
 */

class CountTrainings extends Controller
{
    public function countTrainings() {
        Auth::check();
        $id = Auth::id();
        $count = Training::where('user_id', $id)->count();

        return $count;
    }
}
