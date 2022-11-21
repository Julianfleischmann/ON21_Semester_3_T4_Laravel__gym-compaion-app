<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trainings bearbeiten') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="bg-white rounded p-4 m-5">
            <a class="btn btn-secondary" href="{{ route('trainings.index') }}">zurück</a>

            <form class="mt-4" action="{{ route('trainings.update', $training->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="weight">Trainingsgewicht eintragen</label>
                    <input type="text" name="weight" class="form-control" placeholder="Trainingsgewicht"
                           value="{{ $training->weight }}">
                </div>
                <div class="mb-3">
                    <label for="repetition">Wiederholungen eintragen</label>
                    <input type="text" name="repetition" class="form-control" placeholder="Wiederholungen"
                           value="{{ $training->repetition }}">
                </div>
                <div class="mb-3">
                    <label for="name_id">Art des Trainings auswählen</label>
                    <select name="name_id" id="name">
                        @foreach($trainingNames as $trainingName)
                            <option @if($trainingName->id == $training->name_id)selected="selected"
                                    @endif value="{{ $trainingName->id }}">{{ $trainingName->name }}</option>
                        @endforeach
                    </select>
                    <div class="mt-4 mb-4 alert alert-warning" role="alert">
                        Wenn die Trainingsart fehlt, kann diese einfach angelegt werden.
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Speichern</button>

            </form>
            <form id="createNewTrainingName" name="createNewTrainingName">
                <label for="createNewTrainingName">Neues Training anlegen</label>
                <input type="text" id="trainingName" name="trainingName" placeholder="enter training name" value="123123">

                <button type="button" class="btn btn-primary" id="saveTrainingName" value="add">Hinzufügen</button>
            </form>
        </div>

    </div>
</x-app-layout>


@include('layouts.create-training-ajax');
