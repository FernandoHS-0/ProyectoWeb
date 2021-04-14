<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ControlMateria;
use Illuminate\Support\Facades\File;

class ControlMateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(__DIR__ . '/DataJ/control_materias.json');
        $data = json_decode($json);
        foreach ($data as $item){
            ControlMateria::create(array(
                'idControl' => $item->idControl,
                'idAlumno' => $item->idAlumno,
                'idmaterias' => $item->idmaterias,
                'estado' => $item->estado,
        ));
      
       }
    }
}
