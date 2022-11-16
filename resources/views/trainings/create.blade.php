{{--<form action="{{ route('trainings.store', Auth::user()->id) }}" method="POST">--}}
<form action="{{ route('trainings.store') }}" method="POST">

    @csrf
    <input type="text" name="training_weight" class="form-control" placeholder="Trainingsgewicht">
    <input type="text" name="training_redo" class="form-control" placeholder="Wiederholungen">

    <p>Benutzer: {{ Auth::user()->id }}</p>
    <button type="submit" class="btn btn-primary ml-3">Submit</button>

</form>
