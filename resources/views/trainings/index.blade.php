<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Übersicht aller Trainings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <tr>
                            <th>Trainingsart</th>
                            <th>Trainingsgewicht</th>
                            <th>Wiederholungen</th>
                            <th>Erstellt von</th>
                            <th>Bearbeiten</th>
                            <th>Löschen</th>
                        </tr>

                        @foreach ($trainings as $training)

                            <tr>
                                <td>{{ $training->getTrainingName->name }}</td>
                                <td>{{ $training->weight }}</td>
                                <td>{{ $training->repetition }}</td>
                                <td>{{ $training->getUser->name }}</td>
                                <td><a class="btn btn-secondary" href="{{ route('trainings.edit',$training->id) }}">bearbeiten</a></td>
                                <td>
                                    <form action="{{ route('trainings.destroy', $training->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-warning" type="submit">löschen</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
{{--                        {{ $trainings }}--}}
                    </table>


                    <a class="btn btn-primary" href="{{ route('trainings.create') }}">Neues Training anlegen</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
