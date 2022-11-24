<?php

namespace App\Http\Controllers;

use App\Models\TrainingName;
use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\Gate;

/**
 * Diese Klasse beinhaltet alle Trainings
 * In dem Controller werden Trainings bearbeitet, ausgegeben, gelöscht und erstellt.
 * Ein kompletter CRUD-Zyklus wird hier abgebildet.
 *
 */

class TrainingController extends Controller
{

    /**
     * Wird für das Listing der Inahlte verwendet (Tabelle)
     * Query Builder von Laravel wird hier bentutzt.
     * https://laravel.com/docs/9.x/queries
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // der Variable trainings alle Daten aus dem Model Training zuweisen und an den view trainings.index übergeben
        $trainings = Training::orderBy('id')->paginate(10);

        return view('trainings.index', compact( 'trainings'));
    }

    /**
     * Gibt den View für trainings/create.blade.php aus
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $trainingNames = TrainingName::all();
        return view('trainings.create', compact('trainingNames'));
    }

    /**
     * Store a newly created resource in storage.
     * Informationen für einen Seitenwechsel werden hier ebenfalls über den RedirectResponse an den View übergeben.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $request->validate([
            'weight' => 'required',
            'repetition' => 'required'
        ]);

        Training::create($request->post());
        return redirect()->route('trainings.index')->with('success', 'Das Training wurde erfolgreich gespeichert.');
    }

    /**
     * zeigt eine ausgewälte Ressource an
     * Todo: nicht verwendet, kann in Zukunft noch ausgearbeitet werdenm, wenn mehr Informationen angezeigt werden sollen.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Edit Button mit dem view training
     * gibt dem Template die training Variable, soeie die Training Names mit
     *
     * @param Training $training
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Training $training) {
        $trainingNames = TrainingName::all();
        return view('trainings.edit', compact('training', 'trainingNames'));
    }

    /**
     * Update Method for Trainings
     * Aktualisiert die Trainings beim Speichern von bereits vorhandenen Trainings
     * Zudem ist ein Gate mit eingebaut, welches prüft, ob es dem Nutzer erlaubt ist, das Training zu bearbeiten.
     * Nur der Account, welcher das Training erstellt hat, darf dieses auch bearbeiten.
     * Informationen für einen Seitenwechsel werden hier ebenfalls über den RedirectResponse an den View übergeben.
     *
     * @param Request $request
     * @param Training $training
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Training $training) {

        if (! Gate::allows('update-training', $training)) {
            abort(403, 'Du darfst nur Deinen eigenen Eintrag bearbeiten');
        }

        $request->validate([
            'weight' => 'required',
            'repetition' => 'required'
        ]);

        $training->fill($request->post())->save();
        return redirect()->route('trainings.index')->with('success', 'Das Training wurde erfolgreich aktualisiert.');
    }

    /**
     * Löschen der angelegten Einträge wird hierüber gelöst.
     * Zudem ist ein Gate mit eingebaut, welches prüft, ob es dem Nutzer erlaubt ist, das Training zu bearbeiten.
     * Nur der Account, welcher das Training erstellt hat, darf dieses auch bearbeiten.
     * Informationen für einen Seitenwechsel werden hier ebenfalls über den RedirectResponse an den View übergeben.
     *
     * @param Training $training
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Training $training) {

        if (! Gate::allows('update-training', $training)) {
            abort(403, 'Du darfst nur Deinen eigenen Eintrag löschen');
        }
        $training->delete();
        return redirect()->route('trainings.index')->with('success', 'Das Training wurde erfolgreich gelöscht.');
    }
}
