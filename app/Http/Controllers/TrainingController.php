<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;


class TrainingController extends Controller
{

    public function index() {
        return view('trainings.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'training_weight' => 'required',
            'training_redo' => 'required'
        ]);

        Training::create($request->post());

        return redirect()->route('trainings.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainings.create');
    }
}
