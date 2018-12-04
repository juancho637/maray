<?php

use App\Provider;
use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create([
            'name' => 'PROVEEDOR VARIO',
            'description' => 'XXX'
        ]);
        Provider::create([
            'name' => 'CALIER',
            'description' => 'XXX'
        ]);
        Provider::create([
            'name' => 'CONAVET',
            'description' => 'XXX'
        ]);
        Provider::create([
            'name' => 'DAGO',
            'description' => 'XXX'
        ]);
        Provider::create([
            'name' => 'DISTRIBUCIONES DAGO',
            'description' => 'XXX'
        ]);
        Provider::create([
            'name' => 'DISTRIBUCIONES VETERINARIAS',
            'description' => 'XXX'
        ]);
        Provider::create([
            'name' => 'DISTRIVET',
            'description' => 'XXX'
        ]);
        Provider::create([
            'name' => 'GABRICA',
            'description' => 'XXX'
        ]);
        Provider::create([
            'name' => 'JARAMILLO PETS',
            'description' => 'XXX'
        ]);
        Provider::create([
            'name' => 'JARAPETS',
            'description' => 'XXX'
        ]);
        Provider::create([
            'name' => 'LABORATORIO NOHEMY CRUZ',
            'description' => 'XXX'
        ]);
        Provider::create([
            'name' => 'MARAVEDI',
            'description' => 'XXX'
        ]);
        Provider::create([
            'name' => 'MARAY MEDICINA VETERINARIA',
                'description' => 'XXX'
        ]);
        //factory(Provider::class, 30)->create();
    }
}
