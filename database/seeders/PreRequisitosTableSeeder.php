<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PreRequisitos;
use Illuminate\Support\Facades\File;

class PreRequisitosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(__DIR__ . '/DataJ/prerequisitos.json');
        $data = json_decode($json);
        foreach ($data as $item){
            PreRequisitos::create(array(
                'idRequisito' => $item->idRequisito,
                'idmaterias' => $item->idmaterias,
                'preRequisito' => $item->preRequisito,
            ));
        }
    }
}
