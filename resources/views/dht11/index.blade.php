@extends('layouts.app')

@section('content')

<h1>Temperature : <span id="temperature"></span></h1>
<h1>Humidity : <span id="humidity"></span></h1>

@endsection

@push('js')

<script>
    $(document).ready(function () {
        setInterval(() => {
            $.ajax({
                type: "GET",
                url: "Dht11/getdata",
                success: function (response) {
                    $("#temperature").html(response.data.temperature);
                    $("#humidity").html(response.data.humidity);
                    console.log(response);
                }
            });
        }, 1000);
    });
</script>

@endpush