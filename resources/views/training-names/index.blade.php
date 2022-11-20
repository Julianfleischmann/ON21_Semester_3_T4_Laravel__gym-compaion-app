<table>
    <tr>
        <th>Training_ID</th>
        <th>Training_Name</th>
        <th>Bearbeiten</th>
        <th>Löschen</th>
        <th>LÖSCHEN</th>
    </tr>

    @foreach ($trainingNames as $trainingName)
        <tr>
            <td>{{ $trainingName->id }}</td>
            <td>{{ $trainingName->name }}</td>
            <td><a href="{{ route('training-names.edit', $trainingName->id) }}">Bearbeiten</a></td><!-- noch anlegen -->
            <td>
                <form action="{{ route('training-names.destroy', $trainingName->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Löschen</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
