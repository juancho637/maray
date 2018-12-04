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
                                <input type="text" class="form-control autoSave" name="diet" id="diet" value="{{ old('diet', $history->diet) }}"/>
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
                                <textarea class="form-control autoSave" name="motive" id="motive">{{ $history->motive }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label for="current_illness" class="label-without">Enfermedad actual:</label>
                                <textarea class="form-control autoSave" name="current_illness" id="current_illness">{{ $history->current_illness }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label for="background_pet" class="label-without">Antecedentes de la mascota:</label>
                                <textarea class="form-control autoSave" name="background_pet" id="background_pet">{{ $history->background_pet }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label for="another" class="label-without">Otros:</label>
                                <textarea class="form-control autoSave" name="another" id="another">{{ $history->another }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="general_impression" class="label-without">Impresión general:</label>
                                <textarea class="form-control autoSave" name="general_impression" id="general_impression">{{ $history->general_impression }}</textarea>
                            </div>
                        </div>
                    </div>
                    <h4><strong>Constantes fisiológicas:</strong></h4>
                    <div class="row">
                        <div class="col-xs-1">
                            <div class="form-group">
                                <label for="fc" class="label-without">FC:</label>
                                <input type="text" name="fc" id="fc" class="form-control autoSave" value="{{ $history->fc }}" data-inputmask='"mask": "9[9][9]"' data-mask/>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <div class="form-group">
                                <label for="fr" class="label-without">FR:</label>
                                <input type="text" name="fr" id="fr" class="form-control autoSave" value="{{ $history->fr }}" data-inputmask='"mask": "9[9][9]"' data-mask/>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="pa" class="label-without">PA:</label>
                                <input value="{{ $history->pa }}" type="text" class="form-control autoSave" id="pa" name="pa" data-inputmask='"mask": "9[9][9]/9[9][9] \\m\\e\\d\\i\\a 9[9][9]"' data-mask>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="heartbeat" class="label-without">Pulso:</label>
                                <input type="number" name="heartbeat" id="heartbeat" class="form-control autoSave" value="{{ $history->heartbeat }}"/>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="temperature" class="label-without">Tº rectal:</label>
                                <input type="number" name="temperature" id="temperature" class="form-control autoSave" value="{{ $history->temperature }}"/>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="weight" class="label-without">Peso actual:</label>
                                <input type="number" name="weight" id="weight" class="form-control autoSave" value="{{ $history->weight }}"/>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="square_meter" class="label-without">Metro cuadrado:</label>
                                <input type="number" name="square_meter" id="square_meter" class="form-control autoSave" value="{{ $history->square_meter }}"/>
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
                                        <input type="checkbox" name="digestive_system" id="digestive_system_trigger" class="flat-red" @if($history->switchModel('digestive')->exists()) checked @endif>
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
                                        <textarea class="form-control autoSaveClinicExams" name='systems[digestive][mouth]' id="mouth">{{ $history->getProperty('digestive', 'mouth') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="stomach">Abdomen:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[digestive][stomach]" id="stomach">{{ $history->getProperty('digestive', 'stomach') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="anus">Ano:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[digestive][anus]" id="anus">{{ $history->getProperty('digestive', 'anus') }}</textarea>
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
                                        <input type="checkbox" name="respiratory_system" id="respiratory_system_trigger" class="flat-red" @if($history->switchModel('respiratory')->exists()) checked @endif>
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
                                        <textarea class="form-control autoSaveClinicExams" name="systems[respiratory][breathing_type]" id="breathing_type">{{ $history->getProperty('respiratory', 'breathing_type') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="vesicular_murmur">Murmullo vesicular:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[respiratory][vesicular_murmur]" id="vesicular_murmur">{{ $history->getProperty('respiratory', 'vesicular_murmur') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="rales">Estertores:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[respiratory][rales]" id="rales">{{ $history->getProperty('respiratory', 'rales') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="wheezing">Sibilancias:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[respiratory][wheezing]" id="wheezing">{{ $history->getProperty('respiratory', 'wheezing') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="estridores">Estridores:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[respiratory][estridores]" id="estridores">{{ $history->getProperty('respiratory', 'estridores') }}</textarea>
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
                                        <input type="checkbox" name="genitourinary_system" id="genitourinary_system_trigger" class="flat-red" @if($history->switchModel('genitourinary')->exists()) checked @endif>
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
                                        <textarea class="form-control autoSaveClinicExams" name="systems[genitourinary][penis_vulva]" id="penis_vulva">{{ $history->getProperty('genitourinary', 'penis_vulva') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="testicles">Testículos:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[genitourinary][testicles]" id="testicles">{{ $history->getProperty('genitourinary', 'testicles') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="prostate">Próstata palpación:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[genitourinary][prostate]" id="prostate">{{ $history->getProperty('genitourinary', 'prostate') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="mammary_gland">Glándula mamaria:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[genitourinary][mammary_gland]" id="prostate">{{ $history->getProperty('genitourinary', 'mammary_gland') }}</textarea>
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
                                        <input type="checkbox" name="nervous_system" id="nervous_system_trigger" class="flat-red" @if($history->switchModel('nervous')->exists()) checked @endif>
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
                                        <textarea class="form-control autoSaveClinicExams" name="systems[nervous][conduct]" id="conduct">{{ $history->getProperty('nervous', 'conduct') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="consciousness_state">Estado de conciencia:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[nervous][consciousness_state]" id="consciousness_state">{{ $history->getProperty('nervous', 'consciousness_state') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <h4>Reflejos:</h4>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="previous_members">Miembros anteriores:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[nervous][previous_members]" id="previous_members">{{ $history->getProperty('nervous', 'previous_members') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="subsequent_members">Miembros posteriores:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[nervous][subsequent_members]" id="subsequent_members">{{ $history->getProperty('nervous', 'subsequent_members') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="pupil">Pupila:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[nervous][pupil]" id="pupil">{{ $history->getProperty('nervous', 'pupil') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="anus_vulva">Ano y/o vulva:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[nervous][anus_vulva]" id="anus_vulva">{{ $history->getProperty('nervous', 'anus_vulva') }}</textarea>
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
                                        <input type="checkbox" name="muscle_system" id="muscle_system_trigger" class="flat-red" @if($history->switchModel('muscle')->exists()) checked @endif>
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
                                        <textarea class="form-control autoSaveClinicExams" name="systems[muscle][previous_members]" id="previous_members_muscle">{{ $history->getProperty('muscle', 'previous_members') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="subsequent_members_muscle">Miembros posteriores:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[muscle][subsequent_members]" id="subsequent_members_muscle">{{ $history->getProperty('muscle', 'subsequent_members') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="spine">Columna vertebral:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[muscle][spine]" id="spine">{{ $history->getProperty('muscle', 'spine') }}</textarea>
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
                                        <input type="checkbox" name="skin_annexes" id="skin_annexes_trigger" class="flat-red" @if($history->switchModel('skin_annexes')->exists()) checked @endif>
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
                                        <textarea class="form-control autoSaveClinicExams" name="systems[skin_annexes][ears]" id="ears">{{ $history->getProperty('skin_annexes', 'ears') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="skin">Piel:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[skin_annexes][skin]" id="skin">{{ $history->getProperty('skin_annexes', 'skin') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="nail">Uñas:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[skin_annexes][nail]" id="nail">{{ $history->getProperty('skin_annexes', 'nail') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="hair">Pelo:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[skin_annexes][hair]" id="hair">{{ $history->getProperty('skin_annexes', 'hair') }}</textarea>
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
                                        <input type="checkbox" name="organs_senses" id="organs_senses_trigger" class="flat-red" @if($history->switchModel('organs_senses')->exists()) checked @endif>
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
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][eyelids]" id="eyelids">{{ $history->getProperty('organs_senses', 'eyelids') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="conjunctiva">Conjuntiva:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][conjunctiva]" id="conjunctiva">{{ $history->getProperty('organs_senses', 'conjunctiva') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="fluorescein_test">Prueba de córnea fluoresceína:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][fluorescein_test]" id="fluorescein_test">{{ $history->getProperty('organs_senses', 'fluorescein_test') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="test_rose_bengal">Prueba de córnea de rosa de bengala:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][test_rose_bengal]" id="test_rose_bengal">{{ $history->getProperty('organs_senses', 'test_rose_bengal') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="description_cornea">Descripción de córnea:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][description_cornea]" id="description_cornea">{{ $history->getProperty('organs_senses', 'description_cornea') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="test_shimmer">Test shimmer:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][test_shimmer]" id="test_shimmer">{{ $history->getProperty('organs_senses', 'test_shimmer') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="intraocular_pressure">Presión intraocular:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][intraocular_pressure]" id="intraocular_pressure">{{ $history->getProperty('organs_senses', 'intraocular_pressure') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="middle_inner_ear">Oido medio e interno:</label>
                                        <textarea class="form-control autoSaveClinicExams" name="systems[organs_senses][middle_inner_ear]" id="middle_inner_ear">{{ $history->getProperty('organs_senses', 'middle_inner_ear') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<h4><strong>Examenes complementarios: (aún no esta)</strong></h4>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            <li><a href="#Bone_marrow_aspirate" data-toggle="tab">Aspirado de médula</a></li>
                            <li><a href="#hemoparasites" data-toggle="tab">Hemoparásitos</a></li>
                            <li><a href="#reticulocytes" data-toggle="tab">Reticulocitos</a></li>
                            <li><a href="#morphology" data-toggle="tab">Morfología</a></li>
                            <li class="active"><a href="#hemogram" data-toggle="tab">Hemograma</a></li>
                            <li class="pull-left header">
                                <label style="font-weight: 400;">
                                    <input type="checkbox" name="hematology_exams" id="hematology_exams_trigger" class="flat-red" @if(old('hematology_exams')) checked @endif>
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
                    </div>--}}
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label style="font-size: 18px;margin-top: 10px;margin-bottom: 10px;" for="final_diagnosis"><strong>Diagnóstico:</strong></label>
                                <textarea class="form-control autoSave" name="final_diagnosis" id="final_diagnosis">{{ $history->final_diagnosis }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box" id="vaccination_plan">
                <div class="box-header with-border">
                    <h3 class="box-title">Plan de vacunación</h3>
                    <div class="box-tools">
                        <div class="form-group">
                            <button class="btn btn-info btn-xs">Historial de vacunas</button>
                            <label>
                                <input type="checkbox" name="vaccination_plan" id="vaccination_plan_trigger" class="flat-red" @if(!$history->historyEngagements()->engagementService('services')->get()->isEmpty()) checked @endif>
                                Anexar plan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="box-body" style="display: none;">
                    <div class="row">
                        <form method="post" class="vaccine_form">
                            <div class="col-xs-12 col-lg-3">
                                <div class="form-group">
                                    <label for="vaccine_id">Nombre de la vacuna:</label>
                                    <select class="form-control vaccine_id" name="product_id" id="vaccine_id" style="width: 100%;" required></select>
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
                                            <input name="date" type="text" class="form-control pull-right datepicker" id="vaccination_date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-5">
                                <div class="form-group">
                                    <label for="vaccination_description">Descripción:</label>
                                    <textarea class="form-control" name="description" rows="1" id="vaccination_description"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-1">
                                <div class="form-group">
                                    <label style="color: transparent;">d</label>
                                    <button class="btn btn-success btn-block"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row" id="vaccineForms"></div>
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
                                <textarea class="form-control" name="observations" id="observations">@if(count($history->formulas) && $history->formulas[0]->observations !== null){{ $history->formulas[0]->observations }}@endif</textarea>
                            </div>
                        </div>
                    </div>
                    <h4><strong>Cita de control:</strong></h4>
                    <div class="row">
                        <form id="form_next_engagement_control" method="post">
                            @if($history->historyEngagements()->engagementService('consultation')->get()->isEmpty())
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="date_next_engagement">Fecha de la cita:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input name="date" id="date_next_engagement" type="text" class="form-control pull-right datepicker" required>
                                            <input name="engagement_id" id="engagement_id" type="hidden">
                                            <input name="engagement_detail_id" id="engagement_detail_id" type="hidden">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label for="description_next_engagement">Descripción:</label>
                                        <textarea class="form-control" rows="1" id="description_next_engagement" name="description" required></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-1">
                                    <div class="form-group">
                                        <label style="color: transparent;">d</label>
                                        <button type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>" class="btn btn-success btn-block" style="margin: 0;"><i class="fa fa-check"></i></button>
                                    </div>
                                </div>
                            @else
                                @php($controlEngagement = $history->historyEngagements()->engagementService('consultation')->first()->engagement)
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="date_next_engagement">Fecha de la cita:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input name="date" id="date_next_engagement" type="text" class="form-control pull-right datepicker" required value="{{ $controlEngagement->date }}">
                                            <input name="engagement_id" id="engagement_id" type="hidden" value="{{ $controlEngagement->id }}">
                                        </div>
                                    </div>
                                </div>
                                @foreach($controlEngagement->detailEngagements as $detailEngagement)
                                    @if($detailEngagement->service->abbreviation === 'consultation')
                                        <div class="col-xs-8">
                                            <div class="form-group">
                                                <label for="description_next_engagement">Descripción:</label>
                                                <textarea class="form-control" rows="1" id="description_next_engagement" name="description" required>{{ $detailEngagement->description }}</textarea>
                                                <input name="engagement_detail_id" id="engagement_detail_id" type="hidden" value="{{ $detailEngagement->id }}">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="col-xs-1">
                                    <div class="form-group">
                                        <label style="color: transparent;">d</label>
                                        <button type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>" class="btn btn-info btn-block" style="margin: 0;"><i class="fa fa-check"></i></button>
                                    </div>
                                </div>
                            @endif
                        </form>
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
                            <button class="btn btn-block btn-primary">Terminar</button>
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

            let history_id = "{{ $history->id }}";
            let formula_id = @if(count($history->formulas)) {{ $history->formulas[0]->id }} @else null @endif;
            getNextEngagements();

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

            // Code
            $('.autoSave').blur(function() {
                let data = {};
                data[$(this).attr('name')] = $(this).val();

                updateHistory(data);
            });

            //Código para el autoguardado de los campos de los examenes clínicos
            $('.autoSaveClinicExams').blur(function() {
                let data = {};
                data[$(this).attr('name')] = $(this).val();

                createClinicExam(data);
            });

            //Código para el guardado automatico de las observaciones de la formula
            $('#observations').blur(function() {
                let _this = $(this).val();

                if(history_id !== "" && formula_id === null){
                    createFormula(_this).done(function(response){
                        formula_id = response.id;
                    });
                }

                if(history_id !== "" && formula_id !== null){
                    updateFormula(_this);
                }
            });

            $(document).on("click", "#create-formula-detail", function(){
                if($('#formula_detail_product_id').val() !== null && $('#formula_detail_indications').val() !== '' && $('#formula_detail_quantity').val() !== null){
                    if(history_id !== "" && formula_id === null){
                        createFormula().done(function (response) {
                            formula_id = response.id;

                            createFormulaDetail().done(function (response) {
                                resetFormFormulaDetail(response.view);
                            });
                        });
                    }
                    if(history_id !== "" && formula_id !== null){
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
                            quantity: $('#product_quantity').val(),

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
                        quantity: $('#product_quantity').val(),
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
                let url = '{{ route("api.purchase_orders.details.destroy", [$engagement->purchaseOrder->id, ":detail_id"]) }}';
                url = url.replace(':detail_id', detail_id);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function() {
                        $('.ref-'+detail_id).remove();
                    }
                });
            });

            function arrayForm (form){
                let _form = form.serializeArray();
                let dataArray = [];

                _form.map(function(key) {
                    dataArray[key.name] = key.value;
                });

                return dataArray;
            }

            //Codigo para la gestión de las consultas de control y citas de vacinación
            $('#form_next_engagement_control').submit(function(event){
                event.preventDefault();

                let _form = $(this);
                let dataArray = arrayForm(_form);
                if(dataArray.engagement_id && dataArray.engagement_detail_id) {
                    controlEngagementUpdate(_form, dataArray);
                    return;
                }

                controlEngagement(_form, dataArray);
            });

            //Codigo para la gestión de las citas de vacinación
            $(document).on("submit", ".vaccine_form", function(){
                event.preventDefault();

                const _form = $(this);
                let dataArray = arrayForm(_form);

                if(dataArray.engagement_id && dataArray.engagement_detail_id) {
                    vaccineEngagementUpdate(_form, dataArray);
                    return;
                }

                vaccineEngagement(_form, dataArray);
                $('#vaccine_id').val('');
                $('#vaccination_date').val('');
                $('#vaccination_description').val('');

            });
            /*$(document).on("submit", ".delete_vaccine_form", function(){
                event.preventDefault();

                const _form = $(this);
                let dataArray = arrayForm(_form);

                vaccineEngagementDelete(_form, dataArray);
            });*/

            $('.vaccine_id').select2({
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
                            category: 'biologicos'
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
            function updateEngagement(params = null, engagement_id) {
                let url = '{{ route("api.engagements.update", [":engagement_id"]) }}';
                url = url.replace(':engagement_id', engagement_id);

                return $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: params
                });
            }

            function updateEngagementDetail(params = null, engagement_detail_id) {
                let url = '{{ route("api.engagement_details.update", [":engagement_detail_id"]) }}';
                url = url.replace(':engagement_detail_id', engagement_detail_id);

                return $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: params
                });
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

            function createPurchaseOrderDetail(params = null, purchase_order_id) {
                let url = '{{ route("api.purchase_orders.details.store", [":purchase_order_id"]) }}';
                url = url.replace(':purchase_order_id', purchase_order_id);

                return $.post(url, params);
            }

            function updatePurchaseOrderDetail(params = null, purchase_order_id, detail_id) {
                let url = '{{ route("api.purchase_orders.details.update", [":purchase_order_id", ":detail_id"]) }}';
                url = url.replace(':purchase_order_id', purchase_order_id);
                url = url.replace(':detail_id', detail_id);

                return $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: params
                });
            }

            function createHistoryEngagement(params = null) {
                return $.post('{{ route("api.history_engagement.store") }}', params);
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

            function controlEngagement(form, data) {
                let button = form.find("[type='submit']");
                button.button('loading');

                createEngagement({
                    'pet_id': '{{ $engagement->pet->id }}',
                    'client_id': '{{ $engagement->client->id }}',
                    'user_id': '{{ Auth::user()->id }}',
                    'date': data.date,
                    'engagement_to_be_confirmed': 1
                }).done(function (response) {
                    let _engagement_id = response.id;
                    form.find("[name='engagement_id']").val(_engagement_id);

                    createHistoryEngagement({
                        'history_id': history_id,
                        'engagement_id': _engagement_id
                    });

                    createEngagementDetail({
                        'description': data.description,
                        'abbreviation': 'consultation',
                        'users': '{{ Auth::user()->id }}',
                    }, _engagement_id).done(function (response) {
                        let _engagement_detail_id = response.id;
                        form.find("[name='engagement_detail_id']").val(_engagement_detail_id);
                    });

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
                            'control_engagement': true
                        }, _purchase_order_id).done(function () {
                            button.button('reset');
                            button.removeClass("btn-success").addClass("btn-info");
                        });
                    });
                });
            }

            function controlEngagementUpdate(form, data) {
                let button = form.find("[type='submit']");
                button.button('loading');
                //console.log(data);

                updateEngagement({
                    'date': data.date,
                }, data.engagement_id);

                updateEngagementDetail({
                    'description': data.description,
                }, data.engagement_detail_id);

                button.button('reset');
            }

            function vaccineEngagement(form, data) {
                let button = form.find("[type='submit']");
                button.button('loading');

                createEngagement({
                    'pet_id': '{{ $engagement->pet->id }}',
                    'client_id': '{{ $engagement->client->id }}',
                    'user_id': '{{ Auth::user()->id }}',
                    'date': data.date,
                    'engagement_to_be_confirmed': 1
                }).done(function (response) {
                    let _engagement_id = response.id;
                    //form.find("[name='engagement_id']").val(_engagement_id);

                    createHistoryEngagement({
                        'history_id': history_id,
                        'engagement_id': _engagement_id
                    });

                    createEngagementDetail({
                        'description': data.description,
                        'abbreviation': 'services',
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
                            'vaccine_engagement': true,
                            'product_id': data.product_id,
                            'quantity': 1
                        }, _purchase_order_id).done(function () {
                            button.button('reset');
                            //button.removeClass("btn-success").addClass("btn-info");
                            getNextEngagements();
                        });
                    });
                });
            }

            function getNextEngagements(){
                getHistoryEngagements({
                    abbreviation: 'services'
                }).done(function (response) {
                    $('#vaccineForms').html(response.view);
                });
            }

            function vaccineEngagementUpdate(form, data) {
                let button = form.find("[type='submit']");
                button.button('loading');

                updateEngagement({
                    'date': data.date,
                }, data.engagement_id);

                updateEngagementDetail({
                    'description': data.description,
                }, data.engagement_detail_id);

                updatePurchaseOrderDetail({
                    'vaccine_engagement': true,
                    'product_id': data.product_id,
                    'quantity': 1,
                }, data.purchase_order_id, data.detail_id);

                button.button('reset');
            }

            {{--function vaccineEngagementDelete(form, data) {
                console.log('delete');
            }--}}

            function getHistoryEngagements(params) {
                let url = "{{ route('api.histories.history_engagement.index', [':history_id']) }}";
                url = url.replace(':history_id', history_id);

                return $.get(url, params);
            }
        });
    </script>
@endpush