<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Training erstellen') }}
        </h2>
    </x-slot>

    <a class="btn btn-secondary" href="{{ route('trainings.index') }}">zurück</a>

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

    <form id="createNewTrainingName" name="createNewTrainingName">
        <label for="createNewTrainingName">Create new Training Name</label>
        <input type="text" id="trainingName" name="trainingName" placeholder="enter training name" value="123123">

        <button type="button" class="btn btn-primary" id="saveTrainingName" value="add">Hinzufügen</button>
    </form>


</x-app-layout>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#saveTrainingName').click(function (e) {
            e.preventDefault();

            const formData = {
                name: $('#trainingName').val()
            };

            $.ajax({
                type: "POST",
                url: "{{ route('training-names.store') }}",
                // contentType: "application/json; charset=utf-8",
                data: formData,
                // dataType: "json",
                success: function (data) {
                    // alert("This recipe has been saved in your profile area!");
                    console.info(data);
                    // refreshNames();
                },
                error: function (data) {
                    console.log('Error:', data);
                    console.info('Ajax name ist: ', data)
                    console.info('Feld ist: ', formData)
                }
            });
        });

    {{--    function refreshNames() {--}}
    {{--        $.get("{{ URL::to('create') }}", function(data){--}}
    {{--            $('#createNewTrainingName'.empty().html(data));--}}
    {{--        })--}}
    {{--    }--}}
    {{--    function refreshNames() {--}}
    {{--        // const o = new Option("text", "123")--}}
    {{--        // $(o).html("asdfsdffdsffddffddd");--}}
    {{--        // $("#name").append(o);--}}
    {{--        $.get("{{ url::to('create') }}", function(){--}}
    {{--            let o = new Option("otion text", "value")--}}
    {{--            $(o).html("option text");--}}
    {{--            $("name").append(o);--}}
    {{--            // alert("click");--}}
    {{--        })--}}
    {{--    }--}}
    {{--});--}}
</script>
