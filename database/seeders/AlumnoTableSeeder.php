<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use App\Models\Alumno;
use Illuminate\Support\Facades\File;

class AlumnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('alumno')->delete();
        $json = File::get(__DIR__ . '/DataJ/alumnos.json');
        $data = json_decode($json);
        foreach ($data as $item){
            Alumno::create(array(
                'idAlumno' => $item->idAlumno,
                'PeriodoAct' => $item->PeriodoAct,
                'Matricula' => $item->Matricula,
                'ApellidoPaterno' => $item->ApellidoPaterno,
                'ApellidoMaterno' => $item->ApellidoMaterno,
                'Nombre' => $item->Nombre,
                'Contrasena' => $item->Contrasena,
        ));
      
       }
    }
}
