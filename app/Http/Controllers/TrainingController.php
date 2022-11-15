<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Training;


class TrainingController extends Controller
{

    /**
     * Query Builder from Laravel will be used here
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
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
     * Edit Button with view training und gibt dem Template die training Variable mit
     *
     * @param Training $training
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Training $training) {
        return view('trainings.edit', compact('training'));
    }

    /**
     * Update Method for Trainings
     *
     * @param Request $request
     * @param Training $training
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Training $training) {
        $request->validate([
            'training_weight' => 'required',
            'training_redo' => 'required'
        ]);

        $training->fill($request->post())->save();
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
