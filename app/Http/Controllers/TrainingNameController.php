<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingName;
use Illuminate\Http\Request;

class TrainingNameController extends Controller
{
    /**
     * Wird für das Listing der Namen verwendet (Tabelle)
     * Query Builder von Laravel wird hier bentutzt.
     * https://laravel.com/docs/9.x/queries
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainingNames = TrainingName::all();
        return view('training-names.index', compact('trainingNames'));
    }

    /**
     * Gibt den View training-names.create zurück
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('training-names.create');
    }

    /**
     * Speichert eine neu angelegte ressource.
     * Informationen für einen Seitenwechsel werden hier ebenfalls über den RedirectResponse an den View übergeben.
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

        return redirect()->route('training-names.index')->with('success', 'Der Trainingname wurde erfolreich gespeichert.');
    }

    /**
     * Gibt das Template für das Bearbeiten-Formular der training-names zurück
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function edit(TrainingName $trainingName) {
        return view('training-names.edit', compact('trainingName'));
    }

    /**
     * Update the specified resource in storage.
     * Aktualisiert die Trainings beim Speichern von bereits vorhandenen Trainingsnamen
     * Informationen für einen Seitenwechsel werden hier ebenfalls über den RedirectResponse an den View übergeben.
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
        return redirect()->route('training-names.index')->with('success', 'Der Trainingname wurde erfolreich aktualisiert.');
    }

    /**
     * Löschen der Trainingsnamen.
     * Informationen für einen Seitenwechsel werden hier ebenfalls über den RedirectResponse an den View übergeben.
     *
     * @param  TrainingName $trainingName
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TrainingName $trainingName)
    {
        $trainingName->delete();
        return redirect()->route('training-names.index')->with('success', 'Der Trainingname wurde erfolreich gelöscht.');
    }
}
