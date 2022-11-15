<form action="{{ route('trainings.update', $training->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="training_weight" class="form-control" placeholder="Trainingsgewicht" value="{{ $training->training_weight }}">
    <input type="text" name="training_redo" class="form-control" placeholder="Wiederholungen" value="{{ $training->training_redo }}">
    <button type="submit" class="btn btn-primary ml-3">Submit</button>

</form>
