<form action="{{ route('trainings.store') }}" method="POST">
    @csrf
    <input type="text" name="training_weight" class="form-control" placeholder="Trainingsgewicht">
    <input type="text" name="training_redo" class="form-control" placeholder="Wiederholungen">
    <button type="submit" class="btn btn-primary ml-3">Submit</button>

</form>
