<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingName;
use Illuminate\Http\Request;

class TrainingNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainingNames = TrainingName::all();

        return view('training-names.index', compact('trainingNames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('training-names.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required"
        ]);

        TrainingName::create($request->post());

        return redirect()->route('training-names.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function edit(TrainingName $trainingName) {
        return view('training-names.edit', compact('trainingName'));
    }



//    public function edit(Training $training)
//    {
//
//        $trainingNames = TrainingName::all();
//        return view('trainingnames.edit', compact('training', 'trainingNames'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $trainingName
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, TrainingName $trainingName)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $trainingName->fill($request->post())->save();
        return redirect()->route('training-names.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TrainingName $trainingName
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TrainingName $trainingName)
    {
        $trainingName->delete();
//        return $trainingName;
        return redirect()->route('training-names.index');
    }
}
