<form action="{{ route('trainings.store') }}" method="POST">

    @csrf
    <input type="text" name="weight" class="form-control" placeholder="Trainingsgewicht">
    <input type="text" name="repetition" class="form-control" placeholder="Wiederholungen">
    <select name="name_id" id="name">
        @foreach ($trainingNames as $trainingName)
            <option value="{{ $trainingName->id }}">{{ $trainingName->name }}</option>
        @endforeach
    </select>

    <p>Benutzer: {{ Auth::user()->id }}</p>
    <button type="submit" class="btn btn-primary ml-3">Submit</button>

</form>
