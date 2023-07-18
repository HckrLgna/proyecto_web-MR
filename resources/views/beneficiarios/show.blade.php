@extends('layout.nav')

@section('css-content')

    <link rel="stylesheet" href="{{ asset('/style/form-style.css') }}">

@endsection

@section('home-content')

    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Beneficiarios</span>
    </div>

    <!--    CONTENT    -->


    <div class="card text-center" data-bs-theme="light">
        <div class="card-body">

            <!-- Nombre -->
            <h2 class="formulario__label card-title">Jaimito</h2>



            <div class="formulario" id="formulario">



                <!-- Grupo: Motivo -->
                <div class="formulario__grupo" id="grupo__grado">
                    <h5 class="formulario__label">Motivo</h5>
                    <h6>2s</h6>

                </div>

                <!-- Grupo: Fecha de nacimiento -->
                <div class="formulario__grupo" id="grupo__nombre_colegio">
                    <h5 class="formulario__label">Fecha de Nacimiento</h5>
                    <h6>2s</h6>
                </div>

                <!-- Grupo: Situacion -->
                <div class="formulario__grupo" id="grupo__direccion_colegio">
                    <h5 class="formulario__label">Situación</h5>
                    <h6>2s</h6>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js-content')

@endsection
