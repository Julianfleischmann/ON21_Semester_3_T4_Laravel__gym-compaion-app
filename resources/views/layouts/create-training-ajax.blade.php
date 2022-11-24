{{--
Hier ist das AJAX-Skript, welches in trainings.create und trainings.edit eingebunden wird.
--}}
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
                data: formData,
                success: function (data) {
                    // Lädt die Seite neu nach einem Success.
                    // Dient dazu, dass die Options im Template aktualisiert werden.
                    refreshNames();
                },
                error: function (data) {
                    console.log('Error:', data);
                    console.info('Ajax name ist: ', data)
                    console.info('Feld ist: ', formData)
                }
            });
        });

        // Diese Funktion lädt die Seite bei Aufruf neu
        function refreshNames() {
            location.reload();
        }
    });
</script>
