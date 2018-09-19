@extends('admin._layouts.main')

@section('title', config('app.name').' | Historia')

@section('header', 'Historia clínica')

@section('description', 'Crear historia clínica')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('/plugins/iCheck/all.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Custom styles -->
    <style>
        .label-without{
            /* font-weight: 400; */
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-xs-12 col-lg-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos del propietario</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Nombre completo:</label>
                                <input type="text" class="form-control" value="{{ $engagement->client->full_name }}" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label>Telefono:</label>
                                <input type="text" class="form-control" value="{{ $engagement->client->phone }}" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label>Celular:</label>
                                <input type="text" class="form-control" value="{{ $engagement->client->cell_phone }}" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Dirección:</label>
                                <input type="text" class="form-control" value="{{ $engagement->client->address }}" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Correo electrónico:</label>
                                <input type="text" class="form-control" value="{{ $engagement->client->email }}" disabled/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-lg-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos de la mascota</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" class="form-control" value="{{ $engagement->pet->name }}" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label>Sexo:</label>
                                <input type="text" class="form-control" value="@if($engagement->pet->gender === 'M') Macho @else Hembra @endif" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label>Especie:</label>
                                <input type="text" class="form-control" value="{{ $engagement->pet->breed->species->name }}" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label>Raza:</label>
                                <input type="text" class="form-control" value="{{ $engagement->pet->breed->name }}" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label>Estado reproductivo:</label>
                                <input type="text" class="form-control" value="{{ $engagement->pet->reproductive_status }}" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label for="diet">Dieta:</label>
                                <input type="text" class="form-control autoSave" name="diet" id="diet"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label>Fecha de nacimiento:</label>
                                <input type="text" class="form-control" value="{{ $engagement->pet->birth_date }}" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label>Edad:</label>
                                <input type="text" class="form-control" id="years" disabled/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title"><strong>Historia cínica</strong></h1>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label for="motive" class="label-without">Motivo:</label>
                                <textarea class="form-control autoSave" name="motive" id="motive"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label for="current_illness" class="label-without">Enfermedad actual:</label>
                                <textarea class="form-control autoSave" name="current_illness" id="current_illness"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label for="background_pet" class="label-without">Antecedentes de la mascota:</label>
                                <textarea class="form-control autoSave" name="background_pet" id="background_pet"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label for="another" class="label-without">Otros:</label>
                                <textarea class="form-control autoSave" name="another" id="another"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="general_impression" class="label-without">Impresión general:</label>
                                <textarea class="form-control autoSave" name="general_impression" id="general_impression"></textarea>
                            </div>
                        </div>
                    </div>
                    <h4><strong>Constantes fisiológicas:</strong></h4>
                    <div class="row">
                        <div class="col-xs-1">
                            <div class="form-group">
                                <label for="fc" class="label-without">FC:</label>
                                <input type="text" name="fc" id="fc" class="form-control autoSave"  data-inputmask='"mask": "9[9][9]"' data-mask/>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <div class="form-group">
                                <label for="fr" class="label-without">FR:</label>
                                <input type="text" name="fr" id="fr" class="form-control autoSave"  data-inputmask='"mask": "9[9][9]"' data-mask/>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="pa" class="label-without">PA:</label>
                                <input  type="text" class="form-control autoSave" id="pa" name="pa" data-inputmask='"mask": "9[9][9]/9[9][9] \\m\\e\\d\\i\\a 9[9][9]"' data-mask>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="heartbeat" class="label-without">Pulso:</label>
                                <input type="number" name="heartbeat" id="heartbeat" class="form-control autoSave" />
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="temperature" class="label-without">Tº rectal:</label>
                                <input type="number" name="temperature" id="temperature" class="form-control autoSave" />
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="weight" class="label-without">Peso actual:</label>
                                <input type="number" name="weight" id="weight" class="form-control autoSave" />
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="square_meter" class="label-without">Metro cuadrado:</label>
                                <input type="number" name="square_meter" id="square_meter" class="form-control autoSave" />
                            </div>
                        </div>
                    </div>
                    <h4><strong>Examen clínico:</strong></h4>
                    <div class="box box-warning collapsed-box" id="digestive_system">
                        <div class="box-header with-border">
                            <h3 class="box-title">Aparato digestivo</h3>
                            <div class="box-tools">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="digestive_system" id="digestive_system_trigger" class="flat-red">
                                        Anormal
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="box-body" style="display: none;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="mouth">Boca:</label>
                                        <textarea class="form-control autoSaveClinicExams" name='systems[digestive][mouth]' id="mouth"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="stomach">Abdomen:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[digestive][stomach]" id="stomach"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="anus">Ano:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[digestive][anus]" id="anus"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-warning collapsed-box" id="respiratory_system">
                        <div class="box-header with-border">
                            <h4 class="box-title">Aparato respiratorio</h4>
                            <div class="box-tools">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="respiratory_system" id="respiratory_system_trigger" class="flat-red">
                                        Anormal
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="box-body" style="display: none;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="breathing_type">Tipo de respiración:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[respiratory][breathing_type]" id="breathing_type"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="vesicular_murmur">Murmullo vesicular:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[respiratory][vesicular_murmur]" id="vesicular_murmur"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="rales">Estertores:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[respiratory][rales]" id="rales"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="wheezing">Sibilancias:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[respiratory][wheezing]" id="wheezing"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="estridores">Estridores:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[respiratory][estridores]" id="estridores"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-warning collapsed-box" id="genitourinary_system">
                        <div class="box-header with-border">
                            <h3 class="box-title">Aparato genitourinario</h3>
                            <div class="box-tools">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="genitourinary_system" id="genitourinary_system_trigger" class="flat-red">
                                        Anormal
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="box-body" style="display: none;">
                            <div class="row">
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="penis_vulva">Vulva y/o pene:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[genitourinary][penis_vulva]" id="penis_vulva"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="testicles">Testículos:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[genitourinary][testicles]" id="testicles"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="prostate">Próstata palpación:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[genitourinary][prostate]" id="prostate"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="mammary_gland">Glándula mamaria:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[genitourinary][mammary_gland]" id="prostate"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-warning collapsed-box" id="nervous_system">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sistema nervioso</h3>
                            <div class="box-tools">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="nervous_system" id="nervous_system_trigger" class="flat-red">
                                        Anormal
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="box-body" style="display: none;">
                            <div class="row">
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="conduct">Conducta:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[nervous][conduct]" id="conduct"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="consciousness_state">Estado de conciencia:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[nervous][consciousness_state]" id="consciousness_state"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <h4>Reflejos:</h4>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="previous_members">Miembros anteriores:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[nervous][previous_members]" id="previous_members"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="subsequent_members">Miembros posteriores:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[nervous][subsequent_members]" id="subsequent_members"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="pupil">Pupila:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[nervous][pupil]" id="pupil"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="anus_vulva">Ano y/o vulva:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[nervous][anus_vulva]" id="anus_vulva"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-warning collapsed-box" id="muscle_system">
                        <div class="box-header with-border">
                            <h3 class="box-title">Aparato músculo esquelético</h3>
                            <div class="box-tools">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="muscle_system" id="muscle_system_trigger" class="flat-red">
                                        Anormal
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="box-body" style="display: none;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="previous_members_muscle">Miembros anteriores:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[muscle][previous_members]" id="previous_members_muscle"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="subsequent_members_muscle">Miembros posteriores:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[muscle][subsequent_members]" id="subsequent_members_muscle"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="spine">Columna vertebral:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[muscle][spine]" id="spine"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-warning collapsed-box" id="skin_annexes">
                        <div class="box-header with-border">
                            <h3 class="box-title">Aparato piel y anexos</h3>
                            <div class="box-tools">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="skin_annexes" id="skin_annexes_trigger" class="flat-red">
                                        Anormal
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="box-body" style="display: none;">
                            <div class="row">
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="ears">Orejas:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[skin_annexes][ears]" id="ears"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="skin">Piel:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[skin_annexes][skin]" id="skin"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="nail">Uñas:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[skin_annexes][nail]" id="nail"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="hair">Pelo:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[skin_annexes][hair]" id="hair"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-warning collapsed-box" id="organs_senses">
                        <div class="box-header with-border">
                            <h3 class="box-title">Organos de los sentidos</h3>
                            <div class="box-tools">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="organs_senses" id="organs_senses_trigger" class="flat-red">
                                        Anormal
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="box-body" style="display: none;">
                            <div class="row">
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="eyelids">Párpados:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][eyelids]" id="eyelids"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="conjunctiva">Conjuntiva:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][conjunctiva]" id="conjunctiva"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="fluorescein_test">Prueba de córnea fluoresceína:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][fluorescein_test]" id="fluorescein_test"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="test_rose_bengal">Prueba de córnea de rosa de bengala:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][test_rose_bengal]" id="test_rose_bengal"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="description_cornea">Descripción de córnea:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][description_cornea]" id="description_cornea"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="test_shimmer">Test shimmer:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][test_shimmer]" id="test_shimmer"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="intraocular_pressure">Presión intraocular:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][intraocular_pressure]" id="intraocular_pressure"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="middle_inner_ear">Oido medio e interno:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][middle_inner_ear]" id="middle_inner_ear"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4><strong>Examenes complementarios: (aún no esta)</strong></h4>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            <li><a href="#Bone_marrow_aspirate" data-toggle="tab">Aspirado de médula</a></li>
                            <li><a href="#hemoparasites" data-toggle="tab">Hemoparásitos</a></li>
                            <li><a href="#reticulocytes" data-toggle="tab">Reticulocitos</a></li>
                            <li><a href="#morphology" data-toggle="tab">Morfología</a></li>
                            <li class="active"><a href="#hemogram" data-toggle="tab">Hemograma</a></li>
                            <li class="pull-left header">
                                <label style="font-weight: 400;">
                                    <input type="checkbox" name="hematology_exams" id="hematology_exams_trigger" class="flat-red">
                                    Hematología
                                </label>
                            </li>
                        </ul>
                        <div class="tab-content collapse" id="content_hematology_exams" style="height: 0;">
                            <div class="chart tab-pane active" id="hemogram">
                                <div class="row">
                                    <div class="col-xs-12">
                                        hemogram
                                    </div>
                                </div>
                            </div>
                            <div class="chart tab-pane" id="morphology">
                                <div class="row">
                                    <div class="col-xs-12">
                                        morphology
                                    </div>
                                </div>
                            </div>
                            <div class="chart tab-pane" id="reticulocytes">
                                <div class="row">
                                    <div class="col-xs-12">
                                        reticulocytes
                                    </div>
                                </div>
                            </div>
                            <div class="chart tab-pane" id="hemoparasites">
                                <div class="row">
                                    <div class="col-xs-12">
                                        hemoparasites
                                    </div>
                                </div>
                            </div>
                            <div class="chart tab-pane" id="Bone_marrow_aspirate">
                                <div class="row">
                                    <div class="col-xs-12">
                                        Bone_marrow_aspirate
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label style="font-size: 18px;margin-top: 10px;margin-bottom: 10px;" for="final_diagnosis"><strong>Diagnóstico:</strong></label>
                                <textarea class="form-control autoSave" name="final_diagnosis" id="final_diagnosis"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-info" id="vaccination_plan">
                <div class="box-header with-border">
                    <h3 class="box-title">Plan de vacunación (aún no esta)</h3>
                    <div class="box-tools">
                        <div class="form-group">
                            <button class="btn btn-info btn-xs">Historial de vacunas</button>
                            <label>
                                <input type="checkbox" name="vaccination_plan" id="vaccination_plan_trigger" class="flat-red">
                                Anexar plan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="box-body" style="display: none;">
                    <div class="row">
                        <div class="col-xs-12 col-lg-3">
                            <div class="form-group">
                                <label for="vaccine_id">Nombre de la vacuna:</label>
                                <select class="form-control" id="vaccine_id" style="width: 100%;"></select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="vaccination_date">Fecha de la vacunación:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input value="{{ Date('Y-m-d') }}" name="vaccination_date" type="text" class="form-control pull-right datepicker" id="vaccination_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-5">
                            <div class="form-group">
                                <label for="vaccination_description">Descripción de la vacuna:</label>
                                <textarea class="form-control" name="vaccination_description" rows="1" id="vaccination_description"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-1">
                            <div class="form-group">
                                <label style="color: transparent;">d</label>
                                <button class="btn btn-success btn-block"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>Tratamiento</strong></h3>
                    <div class="box-tools">
                        <div class="dropdown navbar-right" style="margin-right: 0;">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Impresiones <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Impresión del tratamiento</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Impresión de la formula</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Impresión de las observaciones</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-lg-3">
                            <div class="form-group">
                                <label for="formula_detail_product_id">Medicamento:</label>
                                <select class="form-control" id="formula_detail_product_id"></select>
                                <input type="hidden" class="form-control" id="formula_detail_id"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-2">
                            <div class="form-group">
                                <label for="formula_detail_presentation">Presentación:</label>
                                <select class="form-control select2" id="formula_detail_presentation">
                                    <option value="cápsula">Cápsula</option>
                                    <option value="comprimido">Comprimido</option>
                                    <option value="crema">Crema</option>
                                    <option value="gel">Gel</option>
                                    <option value="gragea">Gragea</option>
                                    <option value="jarabe">Jarabe</option>
                                    <option value="jeringa">Jeringa</option>
                                    <option value="jeringa prellenada">Jeringa prellenada</option>
                                    <option value="óvulos">Óvulos</option>
                                    <option value="pipeta">Pipeta</option>
                                    <option value="pomada">Pomada</option>
                                    <option value="spray">Spray</option>
                                    <option value="supositorios">Supositorios</option>
                                    <option value="suspención">Suspención</option>
                                    <option value="tableta">Tableta</option>
                                    <option value="tableta masticable">Tableta masticable</option>
                                    <option value="ungüento">Ungüento</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-2">
                            <div class="form-group">
                                <label for="formula_detail_quantity">Cantidad:</label>
                                <input type="text" class="form-control" id="formula_detail_quantity" value="1" data-inputmask='"mask": "9[9][9]"' data-mask/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                            <div class="form-group">
                                <label for="formula_detail_indications">Indicaciones:</label>
                                <textarea class="form-control" rows="1" id="formula_detail_indications"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-1">
                            <div class="form-group">
                                <label style="color: transparent;">d</label>
                                <button id="create-formula-detail" class="btn btn-success btn-block" style="margin: 0;"><i class="fa fa-plus"></i></button>
                                <button id="update-formula-detail" class="btn btn-info btn-block" style="display: none; margin: 0;"><i class="fa fa-refresh"></i></button>
                            </div>
                        </div>
                        <div class="col-xs-12" id="table-formula">
                            @include('admin.histories.partials.tableFormulaTemplate', compact('engagement'))
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="observations">Observaciones:</label>
                                <textarea class="form-control" name="observations" id="observations"></textarea>
                            </div>
                        </div>
                    </div>
                    <h4><strong>Cita de control: (aún no esta)</strong></h4>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="date_next_engagement">Fecha de la cita:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="date" id="date_next_engagement" type="text" class="form-control pull-right datepicker">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label for="description_next_engagement">Descripción:</label>
                                <textarea class="form-control" rows="1" id="description_next_engagement" name="description"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <div class="form-group">
                                <label style="color: transparent;">d</label>
                                <button id="create-consultation-engagement" class="btn btn-success btn-block" style="margin: 0;"><i class="fa fa-check"></i></button>
                                <button id="edit-consultation-engagement" class="btn btn-info btn-block" style="display: none; margin: 0;"><i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-success">
                <div class="box-header">
                    <h1 class="box-title"><strong>Orden de servicio</strong></h1>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-lg-3">
                            <div class="form-group">
                                <label for="product_id">Producto:</label>
                                <select type="text" class="form-control" id="product_id"></select>
                                <input type="hidden" class="form-control" id="detail_id"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-1">
                            <div class="form-group">
                                <label for="product_quantity">Cantidad:</label>
                                <input type="text" class="form-control" id="product_quantity" value="1" data-inputmask='"mask": "9[9][9]"' data-mask/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-2">
                            <div class="form-group">
                                <label for="product_net_value">Valor neto:</label>
                                <input type="text" class="form-control" id="product_net_value" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-1">
                            <div class="form-group">
                                <label for="product_iva">Iva:</label>
                                <input type="text" class="form-control" id="product_iva" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-2">
                            <div class="form-group">
                                <label for="product_unit_value">Valor unitario:</label>
                                <input type="text" class="form-control" id="product_unit_value" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-2">
                            <div class="form-group">
                                <label for="product_total_value">Valor total:</label>
                                <input type="text" class="form-control" id="product_total_value" disabled/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-1">
                            <div class="form-group">
                                <label style="color: transparent;">d</label>
                                <button id="create-purchase-detail" class="btn btn-success btn-block" style="margin: 0;"><i class="fa fa-plus"></i></button>
                                <button id="update-purchase-detail" class="btn btn-info btn-block" style="display: none; margin: 0;"><i class="fa fa-refresh"></i></button>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <table class="table table-striped" id="products-table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Valor neto</th>
                                        <th>Iva</th>
                                        <th>Valor unitario</th>
                                        <th>Valor total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="purchase-order-details">
                                @include('admin.histories.partials.trPurchaseOrderTemplate', ['details' => $engagement->purchaseOrder->details])
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12">
                            <button class="btn btn-block btn-primary" id="prueba">Terminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <!-- moment -->
    <script src="{{ asset('/plugins/moment/moment-with-locales.min.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('/plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <!-- Script para las funciones js generales -->
    <script src="{{ asset('/js/functions.js') }}"></script>

    <script>
        $(function () {
            /*$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });*/

            //history id
            let history_id = null;
            let formula_id = null;

            //Calculation of age
            const pet_birth_date = "{{ $engagement->pet->birth_date }}";
            moment.locale("es");
            $('#years').val(moment(pet_birth_date, "YYYYMMDD").fromNow(true));

            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Datepicker
            $('.datepicker').datepicker({
                autoclose: true,
                language: 'es',
                format: 'yyyy-mm-dd',
                startDate: new Date()
            });

            //Initialize Datemask2 Elements
            $('[data-mask]').inputmask();

            //Initialize collapsable Elements
            $('.collapse').collapse('hide');

            //Initialize Boxes Elements
            boxChecked('organs_senses_trigger', 'organs_senses');
            boxChecked('digestive_system_trigger', 'digestive_system');
            boxChecked('respiratory_system_trigger', 'respiratory_system');
            boxChecked('genitourinary_system_trigger', 'genitourinary_system');
            boxChecked('nervous_system_trigger', 'nervous_system');
            boxChecked('muscle_system_trigger', 'muscle_system');
            boxChecked('skin_annexes_trigger', 'skin_annexes');
            boxChecked('vaccination_plan_trigger', 'vaccination_plan');

            collapseChecked('hematology_exams_trigger', 'content_hematology_exams');

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            });

            //Código para el autoguardado de los campos de la historia clínica
            $('.autoSave').blur(function() {
                let data = {};
                data[$(this).attr('name')] = $(this).val();

                if(history_id === null){
                    createHistory(data).done(function (response) {
                        history_id = response.id;
                    });
                }else{
                    updateHistory(data);
                }
            });

            //Código para el autoguardado de los campos de los examenes clínicos
            $('.autoSaveClinicExams').blur(function() {
                let data = {};
                data[$(this).attr('name')] = $(this).val();

                console.log(data);

                if(history_id === null){
                    createHistory().done(function (response) {
                        history_id = response.id;

                        createClinicExam(data);
                    });
                }else{
                    createClinicExam(data);
                }
            });

            //Código para el guardado automatico de las observaciones de la formula
            $('#observations').blur(function() {
                let _this = $(this).val();

                if(history_id === null && formula_id === null){
                    createHistory().done(function (response) {
                        history_id = response.id;

                        createFormula(_this).done(function(response){
                            formula_id = response.id;
                        });
                    });
                }

                if(history_id !== null && formula_id === null){
                    createFormula(_this).done(function(response){
                        formula_id = response.id;
                    });
                }

                if(history_id !== null && formula_id !== null){
                    updateFormula(_this);
                }
            });

            //Código para la gestión de la formula
            $(document).on("click", "#create-formula-detail", function(){
                if($('#formula_detail_product_id').val() !== null && $('#formula_detail_indications').val() !== '' && $('#formula_detail_quantity').val() !== null){
                    if(history_id === null && formula_id === null){
                        createHistory().done(function (response) {
                            history_id = response.id;

                            createFormula().done(function (response) {
                                formula_id = response.id;

                                createFormulaDetail().done(function (response) {
                                    resetFormFormulaDetail(response.view);
                                });
                            });
                        });
                    }
                    if(history_id !== null && formula_id === null){
                        createFormula().done(function (response) {
                            formula_id = response.id;

                            createFormulaDetail().done(function (response) {
                                resetFormFormulaDetail(response.view);
                            });
                        });
                    }
                    if(history_id !== null && formula_id !== null){
                        createFormulaDetail().done(function (response) {
                            resetFormFormulaDetail(response.view);
                        });
                    }
                }
            });
            $(document).on("click", "#update-formula-detail", function(){
                updateFormulaDetail().done(function (response) {
                    $('#update-formula-detail').hide();
                    $('#create-formula-detail').show();

                    resetFormFormulaDetail(response.view);
                });
            });
            $(document).on("click", ".edit-formula-detail", function(){
                let url = '{{ route("api.formula_details.show", [":formula_detail_id"]) }}';
                url = url.replace(':formula_detail_id', $(this).attr('data-detail'));

                $('#formula_detail_id').val($(this).attr('data-detail'));

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (response) {
                        $('#update-formula-detail').show();
                        $('#create-formula-detail').hide();

                        $('#formula_detail_product_id').append(`<option value="${response.product.id}" selected>${response.product.name}</option>`);
                        $('#formula_detail_presentation').val(response.formula_detail.presentation).trigger('change');
                        $('#formula_detail_quantity').val(response.formula_detail.quantity);
                        $('#formula_detail_indications').val(response.formula_detail.recommendation);
                    }
                });
            });
            $(document).on("click", ".delete-formula-detail", function(){
                const formula_detail_id = $(this).attr('data-detail');
                let url = '{{ route("api.formula_details.destroy", [":formula_detail_id"]) }}';
                url = url.replace(':formula_detail_id', formula_detail_id);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(response) {
                        $('#table-formula').html(response.view);
                    }
                });
            });

            //Código para la gestión de la orden de compra
            $(document).on("click", "#create-purchase-detail", function(){
                if ($('#product_id').val() !== null){
                    $.ajax({
                        url: '{{ route("api.purchase_orders.details.store", [$engagement->purchaseOrder->id]) }}',
                        type: 'POST',
                        data:{
                            product_id: $('#product_id').val(),
                            quantity: parseInt($('#product_quantity').val()),

                        },
                        success: function (response) {
                            $('#product_id').val(null).trigger('change');
                            $('#product_net_value').val("");
                            $('#product_iva').val("");
                            $('#product_unit_value').val("");
                            $('#product_quantity').val(1);
                            $('#product_total_value').val("");
                            $('#purchase-order-details').html(response);
                        }
                    });
                }
            });
            $(document).on("click", "#update-purchase-detail", function(){
                let url = '{{ route("api.purchase_orders.details.update", [$engagement->purchaseOrder->id, ":detail_id"]) }}';
                url = url.replace(':detail_id', $('#detail_id').val());

                $.ajax({
                    url: url,
                    type: 'PATCH',
                    data:{
                        product_id: $('#product_id').val(),
                        quantity: parseInt($('#product_quantity').val()),
                    },
                    success: function (response) {
                        $('#update-purchase-detail').hide();
                        $('#create-purchase-detail').show();

                        $('#detail_id').val("");
                        $('#product_id').val(null).trigger('change');
                        $('#product_net_value').val("");
                        $('#product_iva').val("");
                        $('#product_unit_value').val("");
                        $('#product_quantity').val(1);
                        $('#product_total_value').val("");
                        $('#purchase-order-details').html(response);
                    }
                });
            });
            $(document).on("click", ".edit-purchase-detail", function(){
                let url = '{{ route("api.products.show", [":product_id"]) }}';
                url = url.replace(':product_id', $(this).attr('data-product'));

                const quantity = $(this).attr('data-quantity');
                $('#detail_id').val($(this).attr('data-detail'));

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (res) {
                        $('#update-purchase-detail').show();
                        $('#create-purchase-detail').hide();

                        $('#product_id').append(`<option value="${res.id}" selected>${res.name}</option>`);
                        $('#product_net_value').val(res.value);
                        $('#product_iva').val(res.tax_percentage + "%");
                        $('#product_unit_value').val(res.unit_value);
                        $('#product_quantity').val(quantity);
                        $('#product_total_value').val(quantity * res.unit_value);
                    }
                });
            });
            $(document).on("click", ".delete-purchase-detail", function(){
                const detail_id = $(this).attr('data-detail');
                let url = '{{ route("api.purchase_orders.details.update", [$engagement->purchaseOrder->id, ":detail_id"]) }}';
                url = url.replace(':detail_id', detail_id);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function() {
                        $('.ref-'+detail_id).remove();
                    }
                });
            });

            //Codigo para la gestión de la consulta de control
            $(document).on("click", "#create-consultation-engagement", function(){
                //TODO: validar si es necesario que haya una formula creada
                let _date = $('#date_next_engagement').val();
                let _description = $('#description_next_engagement').val();

                if(_date !== '' && _description !== ''){
                    if(history_id === null){
                        createHistory().done(function (response) {
                            history_id = response.id;

                            createEngagement({
                                'pet_id': '{{ $engagement->pet->id }}',
                                'client_id': '{{ $engagement->client->id }}',
                                'user_id': '{{ Auth::user()->id }}',
                                'date': _date,
                                'engagement_to_be_confirmed': true
                            }).done(function (response) {
                                let _engagement_id = response.id;

                                createHistoryEngagement(history_id, _engagement_id);

                                createEngagementDetail({
                                    'description': _description,
                                    'users': '{{ Auth::user()->id }}',
                                }, _engagement_id);

                                createPurchaseOrder({
                                    'client_id': '{{ $engagement->client->id }}',
                                    'user_id': '{{ Auth::user()->id }}',
                                    'pet_id': '{{ $engagement->pet->id }}',
                                    'subtotal': 0,
                                    'taxes': 0,
                                    'total_value': 0
                                }, _engagement_id).done(function (response) {
                                    let _purchase_order_id = response.id;

                                    createPurchaseOrderDetail({

                                    }, _purchase_order_id);
                                });
                            });
                        });
                    }else{

                    }
                }
            });
            $(document).on("click", "#edit-consultation-engagement", function(){

            });

            $('#vaccine_id').select2({
                minimumInputLength: 2,
                language: {
                    inputTooShort: function () {
                        return "Por favor ingrese 2 o más letras para realizar la busqueda.";
                    }
                },
                ajax: {
                    url: "{{ route('api.products.index') }}",
                    data: function (params) {
                        return {
                            search: params.term,
                            category: 'services'
                        };
                    },
                    processResults: function (data, params) {
                        return {
                            results: data
                        };
                    },
                }
            });

            $('#formula_detail_product_id').select2({
                minimumInputLength: 2,
                language: {
                    inputTooShort: function () {
                        return "Por favor ingrese 2 o más letras para realizar la busqueda.";
                    }
                },
                ajax: {
                    url: "{{ route('api.products.index') }}",
                    data: function (params) {
                        return {
                            search: params.term,
                            category: 'pharmacy'
                        };
                    },
                    processResults: function (data, params) {
                        return {
                            results: data
                        };
                    },
                }
            });

            $('#product_id').select2({
                minimumInputLength: 2,
                language: {
                    inputTooShort: function () {
                        return "Por favor ingrese 2 o más letras para realizar la busqueda.";
                    }
                },
                ajax: {
                    url: "{{ route('api.products.index') }}",
                    data: function (params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function (data, params) {
                        return {
                            results: data
                        };
                    },
                }
            });

            $('#product_id').change(function() {
                if ($(this).val() !== null) {
                    let url = '{{ route("api.products.show", [":product_id"]) }}';
                    url = url.replace(':product_id', $(this).val());

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function (res) {
                            $('#product_net_value').val(res.value);
                            $('#product_iva').val(res.tax_percentage + "%");
                            $('#product_unit_value').val(res.unit_value);
                            $('#product_total_value').val($('#product_quantity').val() * res.unit_value);
                        }
                    });
                }
            });

            $('#product_quantity').bind('keyup', function() {
                if ($(this).val() !== ""){
                    $('#product_total_value').val(parseInt($(this).val()) * $('#product_unit_value').val());
                }
            });

            function createHistory(params = null) {
                return $.post("{{ route('api.engagements.histories.store', [$engagement->id]) }}", params);
            }

            function updateHistory(params = null) {
                let url = '{{ route("api.histories.update", [":history_id"]) }}';
                url = url.replace(':history_id', history_id);

                return $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: params
                });
            }

            function createEngagement(params = null) {
                return $.post('{{ route("api.engagements.store") }}', params);
            }

            function createEngagementDetail(params = null, engagement_id) {
                let url = '{{ route("api.engagements.engagement_details.store", [":engagement_id"]) }}';
                url = url.replace(':engagement_id', engagement_id);

                return $.post(url, params);
            }

            function createPurchaseOrder(params = null, engagement_id) {
                let url = '{{ route("api.engagements.purchase_orders.store", [":engagement_id"]) }}';
                url = url.replace(':engagement_id', engagement_id);

                return $.post(url, params);
            }

            function createHistoryEngagement(history_id, engagement_id) {
                let url = '{{ route("api.histories.engagements.history_engagement.store", [":history_id", ":engagement_id"]) }}';
                url = url.replace(':history_id', history_id);
                url = url.replace(':engagement_id', engagement_id);

                return $.post(url);
            }

            function createFormula(observations = null) {
                let url = "{{ route('api.histories.formulas.store', [':history_id']) }}";
                url = url.replace(':history_id', history_id);

                return $.post(url , {
                    observations: observations
                });
            }

            function updateFormula(observations = null) {
                let url = "{{ route('api.formulas.update', [':formula_id']) }}";
                url = url.replace(':formula_id', formula_id);

                return $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: {
                        observations: observations,
                    }
                });
            }

            function createFormulaDetail() {
                let url = '{{ route("api.formulas.formula_details.store", [":formula_id"]) }}';
                url = url.replace(':formula_id', formula_id);

                return $.post(url, {
                    product_id: $('#formula_detail_product_id').val(),
                    presentation: $('#formula_detail_presentation').val(),
                    quantity: parseInt($('#formula_detail_quantity').val()),
                    recommendation: $('#formula_detail_indications').val(),
                });
            }

            function updateFormulaDetail() {
                let url = '{{ route("api.formula_details.update", [":formula_detail_id"]) }}';
                url = url.replace(':formula_detail_id', $('#formula_detail_id').val());

                return $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: {
                        product_id: $('#formula_detail_product_id').val(),
                        presentation: $('#formula_detail_presentation').val(),
                        quantity: parseInt($('#formula_detail_quantity').val()),
                        recommendation: $('#formula_detail_indications').val(),
                    }
                });
            }

            function resetFormFormulaDetail(view) {
                $('#formula_detail_id').val("");
                $('#formula_detail_product_id').val(null).trigger('change');
                $('#formula_detail_presentation').val("");
                $('#formula_detail_quantity').val(1);
                $('#formula_detail_indications').val("");
                $('#table-formula').html(view);
            }

            function createClinicExam(params = null) {
                let url = "{{ route('api.histories.clinic_exams.store', [':history_id']) }}";
                url = url.replace(':history_id', history_id);

                return $.post(url , params);
            }
        });
    </script>
@endpush