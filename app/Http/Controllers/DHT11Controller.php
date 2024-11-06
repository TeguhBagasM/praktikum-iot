<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DHT11;

class DHT11Controller extends Controller
{

    public function index() {
        return view('dht11.index');
    }

    public function getData() {
        $data = DHT11::find(1);
        return response()->json(["data" => $data]);
    }

    public function FunctionName($temperature, $humidity) {
        $data = DHT11::where('id', 1)->update([
            'temperature' => $temperature,
            'humidity' => $humidity,
        ]);
    }

}
