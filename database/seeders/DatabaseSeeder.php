<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(MaestroSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(AlumnoSeeder::class);
        $this->call(MatriculaSeeder::class);
        $this->call(OpcionSeeder::class);
        $this->call(AsistenciaSeeder::class);
    }
}
