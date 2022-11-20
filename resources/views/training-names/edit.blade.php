<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Training Namen bearbeiten') }}
        </h2>
    </x-slot>
    <form action="{{ route('training-names.update', $trainingName->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="Trainings-name" value="{{ $trainingName->name }}">

        <p>TrainingName-ID {{ $trainingName->name }}</p>
    <br>
    <br>


        <button type="submit">Speichern</button>
    </form>
</x-app-layout>
