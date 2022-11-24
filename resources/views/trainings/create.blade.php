{{--
Template für das Anlegen von Trainings
--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Training erstellen') }}
        </h2>
    </x-slot>

    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="bg-white rounded p-4 m-5">
            <a class="btn btn-secondary" href="{{ route('trainings.index') }}">zurück</a>

            <form class="mt-4" action="{{ route('trainings.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="weight">Trainingsgewicht in KG eintragen</label>
                    <input type="text" name="weight" class="form-control" placeholder="Trainingsgewicht">
                    @error('weight')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="repetition">Wiederholungen eintragen</label>
                    <input type="text" name="repetition" class="form-control" placeholder="Wiederholungen">
                    @error('repetition')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name_id">Art des Trainings auswählen</label>
                    <select name="name_id" id="name">
                        @foreach ($trainingNames as $trainingName)
                            <option value="{{ $trainingName->id }}">{{ $trainingName->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Speichern</button>

                <div class="mt-4 mb-4 alert alert-warning" role="alert">
                    Wenn eine Trainingsart fehlt, kann diese einfach angelegt werden.
                </div>
            </form>

            <form id="createNewTrainingName" name="createNewTrainingName">
                <label for="createNewTrainingName">Neues Training anlegen</label>
                <input type="text" id="trainingName" name="trainingName" placeholder="enter training name" value="Muster">

                <button type="button" class="btn btn-primary" id="saveTrainingName" value="add">Hinzufügen</button>
            </form>
        </div>
    </div>



</x-app-layout>


@include('layouts.create-training-ajax');

