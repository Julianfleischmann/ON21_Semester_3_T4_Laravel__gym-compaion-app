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
                    // console.info(data);
                    // refreshNames();
                },
                error: function (data) {
                    console.log('Error:', data);
                    console.info('Ajax name ist: ', data)
                    console.info('Feld ist: ', formData)
                }
            });
        });

        function refreshNames() {

        }
        {{--function refreshNames() {--}}
        {{--    // const o = new Option("text", "123")--}}
        {{--    // $(o).html("asdfsdffdsffddffddd");--}}
        {{--    // $("#name").append(o);--}}
        {{--    $.get("{{ url::to('create') }}", function(){--}}
        {{--        let o = new Option("otion text", "value")--}}
        {{--        $(o).html("option text");--}}
        {{--        $("name").append(o);--}}
        {{--        // alert("click");--}}
        {{--    })--}}
        {{--}--}}
    });
</script>
