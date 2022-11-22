<?php

namespace App\Http\Controllers;

use App\Models\TrainingName;
use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class TrainingController extends Controller
{
    private $user;

    public function __construct()
    {
        if (Auth::check()) {
            $this->middleware('auth');
            $this->user = Auth::user()->id;
        }
    }

    /**
     * Display a listing of the resource.
     * Query Builder from Laravel will be used here
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
     * Show the form for creating a new resource.
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $request->validate([
            'weight' => 'required',
            'repetition' => 'required'
        ]);

        // Den aktuellen Array mithilfe der Helper-Function Arr::add der Variable des aktuellen Users erweitern
        $data = $request->post();
        $data = Arr::add($data, 'user_id', $this->user);
        //return print_r($data);

        Training::create($data);
//        Training::create($request->post());
        return redirect()->route('trainings.index');
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
     * Edit Button with view training und gibt dem Template die training Variable mit
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
     *
     * @param Request $request
     * @param Training $training
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Training $training) {
        $request->validate([
            'weight' => 'required',
            'repetition' => 'required'
        ]);

        $training->fill($request->post())->save();
        return redirect()->route('trainings.index');
    }

    /**
     * @param Training $training
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Training $training) {
        $training->delete();
        return redirect()->route('trainings.index');
    }
}
