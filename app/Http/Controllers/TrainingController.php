<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\Training;


class TrainingController extends Controller
{
    function getAllTrainings() {
        return Training::all();
    }

    function showAllTrainings() {
        return view('test');
    }
}
