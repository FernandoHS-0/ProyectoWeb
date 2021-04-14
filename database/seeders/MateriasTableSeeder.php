<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materia;
use Illuminate\Support\Facades\File;

class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(__DIR__ . '/DataJ/materias.json');
        $data = json_decode($json);
        foreach ($data as $item){
            Materia::create(array(
                'idmaterias' => $item->idmaterias,
                'Nombre' => $item->Nombre,
                'Periodo' => $item->Periodo,
                'Nivel' => $item->Nivel,
                'Area' => $item->Area,
                'Creditos' => $item->Creditos,
                'Semestre' => $item->Semestre,
            ));
        }
    }
}
