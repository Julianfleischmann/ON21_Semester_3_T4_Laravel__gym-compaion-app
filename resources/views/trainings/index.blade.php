<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Übersicht aller Trainings') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="bg-white rounded p-4 m-5">
{{--            Sofern Nachrichten ($message) an den View übergeben werden, werden diese ausgegeben--}}
{{--            https://laravel.com/docs/9.x/responses#redirecting-with-flashed-session-data--}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table">
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
                {{ $trainings->links() }}
            <a class="btn btn-primary" href="{{ route('trainings.create') }}">Neues Training anlegen</a>
        </div>
    </div>

</x-app-layout>
