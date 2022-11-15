<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Training;


class TrainingController extends Controller
{

    public function index() {

        // Query Builder from Laravel will be used here
        $trainings = Training::all();
        return view('trainings.index', compact('trainings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('trainings.create');
    }
}
