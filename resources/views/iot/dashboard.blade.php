@extends('layouts.app')

@section('content')
<div class="card-header">
    <h1>sensor dht</h1>
    @foreach ($dhts as $dht)
        <div class="card-body"></div>
            <p>Temperature: {{ $dht->temperature }} °C</p>
            <p>Humidity: {{ $dht->humidity }} %</p>
            <p>Timestamp: {{ $dht->timestamp }}</p>
        </div>
    @endforeach
</div>

@endsection

