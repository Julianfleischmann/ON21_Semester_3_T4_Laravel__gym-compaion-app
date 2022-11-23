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
                    <th>Trainingsgewicht (KG)</th>
                    <th>Wiederholungen</th>
                    <th>Erstellt von</th>
                    <th>Bearbeiten</th>
                    <th>Löschen</th>
                </tr>

{{--                Trainings werden als Training in der Foreach-Schleife übergeben und Zeile für Zeile ausgegeben--}}
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
            </table>
{{--            Pagination wird ausgegeben--}}
                {{ $trainings->links() }}
            <a class="btn btn-primary" href="{{ route('trainings.create') }}">Neues Training anlegen</a>
            <a id="count_trainings" class="btn btn-secondary">Wie viele Trains habe ich gemacht?</a>
            <h4 class="mt-4 h4">Anzahl der Trainings: <span id="counted_trainings"></span></h4>
        </div>
    </div>

</x-app-layout>

{{--AJAX-Abfrage der Anzahl der Trainings--}}
<script>
    $('#count_trainings').click(function() {
        $.ajax({
            url: "{{ route('count-trainings') }}",
            success: function (result) {
                $("#counted_trainings").html(result);
            }
        })
    });
</script>
