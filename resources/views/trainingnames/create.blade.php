<form action="{{ route('trainingnames.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name der Trainingsart">
    <button type="submit">Speichern</button>
</form>
