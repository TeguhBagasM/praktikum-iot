<?php

namespace Database\Seeders;

use App\Models\DHT11;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DHT11Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DHT11::create([
            'temperature' => 0,
            'humidity' => 0,
        ]);
    }
}
