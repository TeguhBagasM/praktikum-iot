@extends('layouts.app')
@section('content')
<div class="min-vh-100 d-flex flex-column justify-content-center align-items-center">
    <div class="container">
      <div class="d-flex align-items-center gap-5">
        <h1 class="text-uppercase fw-bold display-1">user : <span id="name"></span></h1>
      </div>
    </div>
  </div>
@endsection
@push('js')
  <script>
    $(document).ready(function () {
        setInterval(() => {
            $.ajax({
                type: "GET",
                url: "/rfid/checkUser",
                success: function (response) {
                    $('#name').html(response.user.name);
                    console.log(response);
                }
            });
        }, 1000);
    });
  </script>
@endpush
