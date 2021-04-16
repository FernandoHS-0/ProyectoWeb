<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AlumnoTableSeeder::class);
        $this->call(MateriasTableSeeder::class);
        $this->call(ControlMateriasTableSeeder::class);
        $this->call(PreRequisitosTableSeeder::class);
        $this->call(AdministradorSeeder::class);
    }
}
