<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MascotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('mascotas')->insert([
            'nombre' => 'Felix',
            'peso' => '1.5 Kg',
            'altura' => '13 cm',
            'color' => 'negro',
            'raza_id' => '1',
        ]);

        DB::table('mascotas')->insert([
            'nombre' => 'Charnua',
            'peso' => '3.5 Kg',
            'altura' => '33 cm',
            'color' => 'Miel',
            'raza_id' => '2',
        ]);
    }
}
