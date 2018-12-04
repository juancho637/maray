<?php

use App\Area;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'name' => 'FARMACIA'
        ]);
        Area::create([
            'name' => 'CIRUGIA'
        ]);
        Area::create([
            'name' => 'LABORATORIO'
        ]);
        Area::create([
            'name' => 'PROCEDIMIENTOS'
        ]);
        Area::create([
            'name' => 'DROGUERIA'
        ]);
        Area::create([
            'name' => 'CONSULTA'
        ]);
        Area::create([
            'name' => 'TRANSPORTE'
        ]);
        Area::create([
            'name' => 'ECOGRAFIA'
        ]);
        Area::create([
            'name' => 'IMAGENES DIAGNOSTICAS'
        ]);
        Area::create([
            'name' => 'SALA DE ESTETICA'
        ]);
        Area::create([
            'name' => 'HOSPITALIZACION Y GUARDERIA'
        ]);
        Area::create([
            'name' => 'INSUMOS'
        ]);
        Area::create([
            'name' => 'INSUMOS MEDICOS'
        ]);
        Area::create([
            'name' => 'ANESTESIA'
        ]);
        Area::create([
            'name' => 'CONCENTRADOS'
        ]);
        Area::create([
            'name' => 'MEDICAMENTOS ORALES'
        ]);
        Area::create([
            'name' => 'GABRICA'
        ]);
        Area::create([
            'name' => 'PROFILAXIS'
        ]);
    }
}
