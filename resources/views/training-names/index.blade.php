<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Übersicht aller Training Namen') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="bg-white rounded p-4 m-5">
            <table class="table">
                <tr>
                    <th scope="col">Training_ID</th>
                    <th scope="col">Training_Name</th>
                    <th scope="col">Bearbeiten</th>
                    <th scope="col">Löschen</th>
                </tr>

                @foreach ($trainingNames as $trainingName)
                    <tr>
                        <td>{{ $trainingName->id }}</td>
                        <td>{{ $trainingName->name }}</td>
                        <td><a class="btn btn-secondary" href="{{ route('training-names.edit', $trainingName->id) }}">Bearbeiten</a></td><!-- noch anlegen -->
                        <td>
                            <form action="{{ route('training-names.destroy', $trainingName->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-warning" type="submit">Löschen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a class="btn btn-primary" href="{{ route('training-names.create') }}">Neues Training anlegen</a>
        </div>
    </div>

</x-app-layout>
