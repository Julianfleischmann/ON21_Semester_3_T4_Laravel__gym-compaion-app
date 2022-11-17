<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            {{ __('Dashboard') }}--}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Hier sind alle Trainings</h1>

                    <table>
                        <tr>
                            <th>Trainingsgewicht</th>
                            <th>Wiederholungen</th>
                            <th>Erstellt von</th>
                            <th>Bearbeiten</th>
                            <th>Löschen</th>
                        </tr>

                        @foreach ($trainings as $training)

                            <tr>
                                <td>{{ $training->training_weight }}</td>
                                <td>Wiederholungen: {{ $training->training_redo }}</td>
                                <td>{{ $training->getUser->name }}</td>
                                <td><a class="btn btn-primary" href="{{ route('trainings.edit',$training->id) }}">Edit</a></td>
                                <td>
                                    <form action="{{ route('trainings.destroy', $training->id) }}" method="Post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
{{--                        {{ $trainings }}--}}
                    </table>


                    <a class="btn btn-primary" href="{{ route('trainings.create') }}">Create new Training</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
