<form action="{{ route('trainings.update', $training->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="weight" class="form-control" placeholder="Trainingsgewicht" value="{{ $training->weight }}">
    <input type="text" name="repetition" class="form-control" placeholder="Wiederholungen" value="{{ $training->repetition }}">
    <button type="submit" class="btn btn-primary ml-3">Submit</button>

</form>
