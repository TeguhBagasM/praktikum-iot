<?php

namespace App\Http\Controllers;

use App\Models\Dht;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        // eloquent
        $dhts = Dht::all();
        return view('iot.dashboard', ['dhts' => $dhts]);
    }
    // query native
    // select humidity, temperature, timestamp from dhts;
}

