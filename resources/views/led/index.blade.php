@extends('layouts.app')
@section('content')
  <div class="min-vh-100 bg-light py-5">
  <div class="container">
    <!-- Header Section -->
    <div class="row mb-5">
      <div class="col-lg-6">
        <div class="card bg-white shadow-sm rounded-4 p-4">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h1 class="display-4 fw-bold text-success mb-0">Led 1</h1>
              <p class="text-muted mb-0">Monitoring & Control System</p>
            </div>
            <div class="d-flex align-items-center gap-3">
              <span class="fs-5">LED Control</span>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="switch" 
                style="width: 60px; height: 30px; cursor: pointer;">
              </div>
              <p id="ledState" class="mt-3"></p>
              <span id="ledState" class="badge rounded-pill px-3 py-2"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card bg-white shadow-sm rounded-4 p-4">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h1 class="display-4 fw-bold text-success mb-0">Led 2</h1>
              <p class="text-muted mb-0">Monitoring & Control System</p>
            </div>
            <div class="d-flex align-items-center gap-3">
              <span class="fs-5">LED Control</span>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="switch" 
                style="width: 60px; height: 30px; cursor: pointer;">
              </div>
              <p id="ledState" class="mt-3"></p>
              <span id="ledState" class="badge rounded-pill px-3 py-2"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card bg-white shadow-sm rounded-4 p-4">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h1 class="display-4 fw-bold text-success mb-0">Led 3</h1>
              <p class="text-muted mb-0">Monitoring & Control System</p>
            </div>
            <div class="d-flex align-items-center gap-3">
              <span class="fs-5">LED Control</span>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="switch" 
                style="width: 60px; height: 30px; cursor: pointer;">
              </div>
              <p id="ledState" class="mt-3"></p>
              <span id="ledState" class="badge rounded-pill px-3 py-2"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card bg-white shadow-sm rounded-4 p-4">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h1 class="display-4 fw-bold text-success mb-0">Led 4</h1>
              <p class="text-muted mb-0">Monitoring & Control System</p>
            </div>
            <div class="d-flex align-items-center gap-3">
              <span class="fs-5">LED Control</span>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="switch" 
                style="width: 60px; height: 30px; cursor: pointer;">
              </div>
              <p id="ledState" class="mt-3"></p>
              <span id="ledState" class="badge rounded-pill px-3 py-2"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
  <script>
    function getState() {
      $.ajax({
        type: "GET",
        url: "{{ route('led.state') }}",
        success: function(response) {
          let ledState = response
          return ledState
        }
      });
    }

    function ledSwitch(state) {
      $.ajax({
        type: "POST",
        url: "{{ route('led.switch') }}",
        data: {
          _token: "{{ csrf_token() }}",
          state: state ? 1 : 0,
        },
        success: function(response) {
          $("#ledState").html(response == 1 ? "ON" : "OFF");
        }
      });
    }

    $(document).ready(function() {
      const ledState = getState()
      $("#ledState").html(ledState ? "ON" : "OFF");

      $("#switch").on("change", function() {
        var state = $(this).prop("checked");
        ledSwitch(state)
      });
    });
  </script>
@endpush
