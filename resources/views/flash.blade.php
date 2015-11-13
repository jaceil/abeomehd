@if(session()->has('flash_message'))
    <script>
        swal({
            title: "{{ session('flash_message.title') }}",
            text: "{{ session('flash_message.message') }}",
            type: "{{ session('flash_message.type') }}",
            timer: 1600,
            showConfirmButton: false
        });
    </script>
@endif