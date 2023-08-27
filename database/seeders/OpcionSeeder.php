<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Opcion;

class OpcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Opcion::create(['status' => 'A']);
        Opcion::create(['status' => 'T']);
        Opcion::create(['status' => 'F']);
    }
}
