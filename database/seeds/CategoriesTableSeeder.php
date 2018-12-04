<?php

use App\Area;
use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Category::class, 20)->create();

        /*Category::create([
            'name' => 'Peluquería',
            'description' => 'xxx',
            'abbreviation' => 'aesthetic'
        ]);
        Category::create([
            'name' => 'Farmacia',
            'description' => 'xxx',
            'abbreviation' => 'pharmacy'
        ]);
        Category::create([
            'name' => 'Servicios Médicos',
            'description' => 'xxx',
            'abbreviation' => 'services'
        ]);
        Category::create([
            'name' => 'Domicilios',
            'description' => 'xxx',
            'abbreviation' => 'home_services'
        ]);
        Category::create([
            'name' => 'Cirugías',
            'description' => 'xxx',
            'abbreviation' => 'surgery'
        ]);
        Category::create([
            'name' => 'Consultas',
            'description' => 'xxx',
            'abbreviation' => 'consultation'
        ]);*/
        Category::create([
            'name' => 'MEDICAMENTO INYECTABLE',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'BIOLOGICOS',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA ABDOMINAL',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA APARATO GENITOURINARIO',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA DE APARATO GENITOURINARIO',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA DE ORGANOS DE LOS SENTIDOS',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA DE ORTOPEDIA Y TRAUMATOLOGIA',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA DE ORTOPEDIA Y TRAUMATOLOGIA',
            'area_id' => Area::where('name', 'LABORATORIO')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA DE TORAX',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA DEL APARATO DIGESTIVO',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA GENERAL',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA ONCOLOGICA',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA ORGANOS DE LOS SENTIDOS',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA ORTOPEDIA',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA ORTOPEDIA',
            'area_id' => Area::where('name', 'PROCEDIMIENTOS')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA TEJIDOS BLANDOS',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'CIRUGIA TEJIDOS BLANDOS',
            'area_id' => Area::where('name', 'PROCEDIMIENTOS')->first()->id
        ]);
        Category::create([
            'name' => 'CONCENTRADO',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'CONSULTA',
            'area_id' => Area::where('name', 'CONSULTA')->first()->id
        ]);
        Category::create([
            'name' => 'DERECHOS DE SALA',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'DOMICILIO',
            'area_id' => Area::where('name', 'TRANSPORTE')->first()->id
        ]);
        Category::create([
            'name' => 'DONDIDENJARO',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'DROGUERIA GEREUALEO',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'ECOCARDIOGRAFIA',
            'area_id' => Area::where('name', 'ECOGRAFIA')->first()->id
        ]);
        Category::create([
            'name' => 'ECOCARDIOGRAFIA',
            'area_id' => Area::where('name', 'IMAGENES DIAGNOSTICAS')->first()->id
        ]);
        Category::create([
            'name' => 'ECOGRAFIA',
            'area_id' => Area::where('name', 'IMAGENES DIAGNOSTICAS')->first()->id
        ]);
        Category::create([
            'name' => 'ECOGRAFIA DEL CORAZON',
            'area_id' => Area::where('name', 'IMAGENES DIAGNOSTICAS')->first()->id
        ]);
        Category::create([
            'name' => 'ECOGRAFIA GENERAL',
            'area_id' => Area::where('name', 'IMAGENES DIAGNOSTICAS')->first()->id
        ]);
        Category::create([
            'name' => 'ECOGRAFIA GENERAL',
            'area_id' => Area::where('name', 'ECOGRAFIA')->first()->id
        ]);
        Category::create([
            'name' => 'ELECTROCARDIOGRAFIA',
            'area_id' => Area::where('name', 'IMAGENES DIAGNOSTICAS')->first()->id
        ]);
        Category::create([
            'name' => 'ENDOSCOPIA',
            'area_id' => Area::where('name', 'IMAGENES DIAGNOSTICAS')->first()->id
        ]);
        Category::create([
            'name' => 'EOCGRAFIA DEL CORAZON',
            'area_id' => Area::where('name', 'IMAGENES DIAGNOSTICAS')->first()->id
        ]);
        Category::create([
            'name' => 'ESEENtEKTO R tA',
            'area_id' => Area::where('name', 'SALA DE ESTETICA')->first()->id
        ]);
        Category::create([
            'name' => 'GUARDERIA',
            'area_id' => Area::where('name', 'HOSPITALIZACION Y GUARDERIA')->first()->id
        ]);
        Category::create([
            'name' => 'HEMATOLOGIA',
            'area_id' => Area::where('name', 'LABORATORIO')->first()->id
        ]);
        Category::create([
            'name' => 'HEMOGRAMA',
            'area_id' => Area::where('name', 'LABORATORIO')->first()->id
        ]);
        Category::create([
            'name' => 'HOSPITALIZACION',
            'area_id' => Area::where('name', 'HOSPITALIZACION Y GUARDERIA')->first()->id
        ]);
        Category::create([
            'name' => 'HOSPITALIZACION',
            'area_id' => Area::where('name', 'INSUMOS')->first()->id
        ]);
        Category::create([
            'name' => 'INFILTRACIONES',
            'area_id' => Area::where('name', 'PROCEDIMIENTOS')->first()->id
        ]);
        Category::create([
            'name' => 'INSUGIA x ORGANOS x LOS SENTIDOS',
            'area_id' => Area::where('name', 'INSUMOS')->first()->id
        ]);
        Category::create([
            'name' => 'INSUMO QUIRURGICO',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'INSUMOS  MEDICOS',
            'area_id' => Area::where('name', 'INSUMOS')->first()->id
        ]);
        Category::create([
            'name' => 'INSUMOS DE CIRUGIA',
            'area_id' => Area::where('name', 'INSUMOS')->first()->id
        ]);
        Category::create([
            'name' => 'INSUMOS DE CIRUGIA',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'INSUMOS GENERALES',
            'area_id' => Area::where('name', 'INSUMOS MEDICOS')->first()->id
        ]);
        Category::create([
            'name' => 'INSUMOS GENERALES',
            'area_id' => Area::where('name', 'INSUMOS')->first()->id
        ]);
        Category::create([
            'name' => 'INSUMOS GENERALES',
            'area_id' => Area::where('name', 'PROCEDIMIENTOS')->first()->id
        ]);
        Category::create([
            'name' => 'INSUMOS MEDICOS',
            'area_id' => Area::where('name', 'INSUMOS')->first()->id
        ]);
        Category::create([
            'name' => 'KASRRKACTO PQRS',
            'area_id' => Area::where('name', 'SALA DE ESTETICA')->first()->id
        ]);
        Category::create([
            'name' => 'LIQUIDOS Y ELECTROLITOS',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDIAMENTO TOPICO',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO  TOPICO',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO INHALADO',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO INYECTABLE',
            'area_id' => Area::where('name', 'ANESTESIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO INYECTABLE',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO INYECTABLE',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO INYECTABLE ',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO OFTALMICO',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO OFTALMICO',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO ORAL',
            'area_id' => Area::where('name', 'ANESTESIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO ORAL',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO ORAL',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO ORAL',
            'area_id' => Area::where('name', 'LABORATORIO')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO ORAL',
            'area_id' => Area::where('name', 'CONCENTRADOS')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO ORAL',
            'area_id' => Area::where('name', 'MEDICAMENTOS ORALES')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO TOPICO',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO TOPICO',
            'area_id' => Area::where('name', 'PROCEDIMIENTOS')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO TOPICO',
            'area_id' => Area::where('name', 'GABRICA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO TOPICO',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO TOPICO',
            'area_id' => Area::where('name', 'SALA DE ESTETICA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTO TOPO',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTOS INHALADOS',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTOS INYECTABLE',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTOS MAGISTRALES',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTOS MAGISTRALES',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTOS ORAL',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTOS ORAL',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTOS ORALES',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDICAMENTOS ORALES ',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDIMIMENTO ORAL',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'MEDINUMENTO INYECTABLE',
            'area_id' => Area::where('name', 'FARMACIA')->first()->id
        ]);
        Category::create([
            'name' => 'MICROBIOLOGIA',
            'area_id' => Area::where('name', 'LABORATORIO')->first()->id
        ]);
        Category::create([
            'name' => 'ORTOPEDIA',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'PARAFARMACIA',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'PARAFARMACIA',
            'area_id' => Area::where('name', 'HOSPITALIZACION Y GUARDERIA')->first()->id
        ]);
        Category::create([
            'name' => 'PARAFARMACIA',
            'area_id' => Area::where('name', 'INSUMOS')->first()->id
        ]);
        Category::create([
            'name' => 'PATOLOGIA',
            'area_id' => Area::where('name', 'LABORATORIO')->first()->id
        ]);
        Category::create([
            'name' => 'PELUQUERIA',
            'area_id' => Area::where('name', 'SALA DE ESTETICA')->first()->id
        ]);
        Category::create([
            'name' => 'PELUQUERIA GENERAL',
            'area_id' => Area::where('name', 'SALA DE ESTETICA')->first()->id
        ]);
        Category::create([
            'name' => 'PELUQUERIA GENERAL',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'PROCEDIMEINTO ANESTESICO',
            'area_id' => Area::where('name', 'ANESTESIA')->first()->id
        ]);
        Category::create([
            'name' => 'PROCEDIMIENTO ANESTESICO',
            'area_id' => Area::where('name', 'ANESTESIA')->first()->id
        ]);
        Category::create([
            'name' => 'PROCEDIMIENTO MEDICO',
            'area_id' => Area::where('name', 'PROCEDIMIENTOS')->first()->id
        ]);
        Category::create([
            'name' => 'PROCEDIMIENTO MEDICO',
            'area_id' => Area::where('name', 'CIRUGIA')->first()->id
        ]);
        Category::create([
            'name' => 'PROCEDIMIENTO MEDICO',
            'area_id' => Area::where('name', 'IMAGENES DIAGNOSTICAS')->first()->id
        ]);
        Category::create([
            'name' => 'PROCEDIMIENTOS ESPECIALES',
            'area_id' => Area::where('name', 'PROCEDIMIENTOS')->first()->id
        ]);
        Category::create([
            'name' => 'PROCEDIMIENTOS GENERALES',
            'area_id' => Area::where('name', 'PROCEDIMIENTOS')->first()->id
        ]);
        Category::create([
            'name' => 'PROCEDIMIENTOS GENERALES',
            'area_id' => Area::where('name', 'CONSULTA')->first()->id
        ]);
        Category::create([
            'name' => 'PROFILAXIS',
            'area_id' => Area::where('name', 'PROFILAXIS')->first()->id
        ]);
        Category::create([
            'name' => 'PROFILAXIS ',
            'area_id' => Area::where('name', 'PROFILAXIS')->first()->id
        ]);
        Category::create([
            'name' => 'PRUEBA ESPECIAL DE DIAGNOSTICO',
            'area_id' => Area::where('name', 'LABORATORIO')->first()->id
        ]);
        Category::create([
            'name' => 'PRUEBAS BASICAS',
            'area_id' => Area::where('name', 'LABORATORIO')->first()->id
        ]);
        Category::create([
            'name' => 'PRUEBAS DE DIAGNOSTICO ESPECIAL',
            'area_id' => Area::where('name', 'LABORATORIO')->first()->id
        ]);
        Category::create([
            'name' => 'QUIMICA SANGUINEA',
            'area_id' => Area::where('name', 'LABORATORIO')->first()->id
        ]);
        Category::create([
            'name' => 'RAYOS X',
            'area_id' => Area::where('name', 'IMAGENES DIAGNOSTICAS')->first()->id
        ]);
        Category::create([
            'name' => 'TABLETADUINUTABLETAMLL RSUB',
            'area_id' => Area::where('name', 'DROGUERIA')->first()->id
        ]);
        Category::create([
            'name' => 'TERAPIA ONCOLOGICA',
            'area_id' => Area::where('name', 'PROCEDIMIENTOS')->first()->id
        ]);
        Category::create([
            'name' => 'ULTRADEHSOXULTRADEHSTO ARXM',
            'area_id' => Area::where('name', 'SALA DE ESTETICA')->first()->id
        ]);
    }
}
