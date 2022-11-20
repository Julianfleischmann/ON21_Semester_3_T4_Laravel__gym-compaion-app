<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Training Namen erstellen') }}
        </h2>
    </x-slot>
    <form action="{{ route('training-names.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name der Trainingsart">
        <button type="submit">Speichern</button>
    </form>
</x-app-layout>
