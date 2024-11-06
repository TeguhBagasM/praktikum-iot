<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Webiot;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WebiotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Webiot::create([
            'id'=>1,
            'rfid_tag'=>123,
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now()
        ]);
    }
}
