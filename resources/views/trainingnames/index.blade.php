<table>
    <tr>
        <th>Training_ID</th>
        <th>Training_Name</th>
    </tr>

    @foreach ($trainingNames as $trainingName)
    <tr>
        <td>{{ $trainingName->id }}</td>
        <td>{{ $trainingName->name }}</td>
    </tr>
    @endforeach
</table>
