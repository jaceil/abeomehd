@extends('layout')

@section('content')
    <h1>About Us</h1>

    <div id="test">
        <table class="table table-bordered" >
            <thead>
                <tr><th>Plate</th><th>Type</th><th>Description</th><th>Processed?</th></tr>
            </thead>
            <tbody v-for="plate in plates">
                <tr><td>@{{ plate.name }}</td><td>@{{ plate.plate_type }}</td><td>@{{ plate.description }}</td><td>@{{ plate.isProcessed }}</td></tr>
            </tbody>
        </table>

        <pre>
            @{{ $data | json }}
        </pre>
    </div>


@stop

@section('scripts')
    <script src="/js/guestbook.js"></script>

@stop