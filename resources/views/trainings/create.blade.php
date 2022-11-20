<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Training erstellen') }}
        </h2>
    </x-slot>

    <a class="btn btn-secondary" href="{{ route('trainings.index') }}">zurück</a>

    <form action="{{ route('trainings.store') }}" method="POST">

        @csrf
        <input type="text" name="weight" class="form-control" placeholder="Trainingsgewicht">
        <input type="text" name="repetition" class="form-control" placeholder="Wiederholungen">
        <select name="name_id" id="name">
            @foreach ($trainingNames as $trainingName)
                <option value="{{ $trainingName->id }}">{{ $trainingName->name }}</option>
            @endforeach
        </select>

        <p>Benutzer: {{ Auth::user()->id }}</p>
        <button type="submit" class="btn btn-primary ml-3">Submit</button>

    </form>
</x-app-layout>
