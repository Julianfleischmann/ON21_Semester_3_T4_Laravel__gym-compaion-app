
<x-app-layout>
    <form action="{{ route('trainings.update', $training->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="weight" class="form-control" placeholder="Trainingsgewicht"
               value="{{ $training->weight }}">
        <input type="text" name="repetition" class="form-control" placeholder="Wiederholungen"
               value="{{ $training->repetition }}">
        <select name="name_id" id="name">
            @foreach($trainingNames as $trainingName)
                <option @if($trainingName->id == $training->name_id)selected="selected"
                        @endif value="{{ $trainingName->id }}">{{ $trainingName->name }}</option>
            @endforeach
        </select>


        <button type="submit" class="btn btn-primary ml-3">Submit</button>

    </form>
</x-app-layout>
