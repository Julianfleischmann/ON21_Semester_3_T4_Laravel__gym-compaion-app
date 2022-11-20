<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Training Namen bearbeiten') }}
        </h2>
    </x-slot>

    <a class="btn btn-secondary" href="{{ route('training-names.index') }}">zurück</a>

    <form action="{{ route('training-names.update', $trainingName->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="Trainings-name" value="{{ $trainingName->name }}">
    <br>
    <br>


        <button class="btn btn-primary" type="submit">Speichern</button>
    </form>
</x-app-layout>
