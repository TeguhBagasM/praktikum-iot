@extends('layouts.app')
@section('content')
  <div class="min-vh-100 bg-light py-5">
  <div class="container">
    <!-- Header Section -->
    <div class="row mb-5">
      <div class="col-lg-8">
        <div class="card bg-white shadow-sm rounded-4 p-4">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h1 class="display-4 fw-bold text-primary mb-0">Smart Home</h1>
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
      <div class="row g-4 mb-5">
        <div class="col-md-6">
          <div class="card bg-white shadow-sm rounded-4 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0"><i class="fas fa-temperature-high text-danger me-2"></i>Temperature</h5>
              <span id="tempStatus" class="badge bg-success rounded-pill px-3">Normal</span>
            </div>
            <h2 id="temperature" class="display-3 fw-bold mb-0"><span id="temperature"></span>°C</h2>
            <div id="tempChart" class="mt-4" style="height: 200px;"></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card bg-white shadow-sm rounded-4 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0"><i class="fas fa-droplet text-primary me-2"></i>Humidity</h5>
              <span id="humidStatus" class="badge bg-success rounded-pill px-3">Normal</span>
            </div>
            <h2 id="humidity" class="display-3 fw-bold mb-0"><span id="humidity"></span>%</h2>
            <div id="humidChart" class="mt-4" style="height: 200px;"></div>
          </div>
        </div>
      </div>
  
      <!-- History Table -->
      <div class="card bg-white shadow-sm rounded-4 p-4">
        <h5 class="mb-4">Sensor Reading History</h5>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Timestamp</th>
                <th>Temperature</th>
                <th>Humidity</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody id="historyTable">
              <!-- Data will be populated by JavaScript -->
            </tbody>
          </table>
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
