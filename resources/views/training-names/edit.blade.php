<form action="{{ route('training-names.update', $trainingName->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" placeholder="{{ $trainingName->name }}">

    <p>TrainingName-ID {{ $trainingName->name }}</p>
<br>
<br>


    <button type="submit">Speichern</button>
</form>


