<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Training Namen bearbeiten') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="bg-white rounded p-4 m-5">
            <a class="btn btn-secondary" href="{{ route('training-names.index') }}">zurück</a>

            <form class="mt-4" action="{{ route('training-names.update', $trainingName->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Name der Trainingsart eingeben</label>
                    <input type="text" name="name" placeholder="Trainings-name" value="{{ $trainingName->name }}" required="required">
                    @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Speichern</button>
            </form>

        </div>
    </div>
</x-app-layout>
