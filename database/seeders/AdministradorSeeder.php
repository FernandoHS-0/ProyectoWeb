<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrador;
use Illuminate\Support\Facades\File;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(__DIR__ . '/DataJ/administrador.json');
        $data = json_decode($json);
        foreach ($data as $item){
            Administrador::create(array(
                'idadministrador' => $item->idadministrador,
                'contrasena' => $item->contrasena,
                'Nombre' => $item->Nombre,
                'ApellidoP' => $item->ApellidoP,
                'ApellidoM' => $item->ApellidoM,
        ));
      
       }
    }
}
