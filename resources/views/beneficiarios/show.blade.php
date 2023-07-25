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
            <h2 class="formulario__label card-title">{{$beneficiario->nombre}}</h2>



            <div class="formulario" id="formulario">


                <!-- Grupo: Motivo -->
                <div class="formulario__grupo" id="grupo__grado">
                    <h5 class="formulario__label">Motivo</h5>
                    <h6>{{$beneficiario->situacion}}</h6>

                </div>

                <!-- Grupo: Fecha de nacimiento -->
                <div class="formulario__grupo" id="grupo__nombre_colegio">
                    <h5 class="formulario__label">Fecha de Nacimiento</h5>
                    <h6>{{$beneficiario->fecha_nacimiento}}</h6>
                </div>

                <!-- Grupo: Usuario registrado -->
                <div class="formulario__grupo" id="grupo__direccion_colegio">
                    <h5 class="formulario__label">Registro:</h5>
                    <h6>{{$user->fullname}}</h6>

                </div>

                <!-- Grupo: Fecha de ingreso -->
                <div class="formulario__grupo" id="grupo__nombre_colegio">
                    <h5 class="formulario__label">Fecha de Ingreso</h5>
                    <h6>{{$beneficiario->created_at}}</h6>
                </div>

                <!-- Grupo: Usuario tiempo permanencia -->
                <div class="formulario__grupo" id="grupo__direccion_colegio">
                    <h5 class="formulario__label">Tiempo de permanencia:</h5>
                    <h6>{{$user->tiempo_permanencia($beneficiario->created_at)}}</h6>
                </div>

                <!-- Grupo: Fecha de ultima actualizacion -->
                <div class="formulario__grupo" id="grupo__nombre_colegio">
                    <h5 class="formulario__label">Ultima fecha actualizacion</h5>
                    <h6>{{$beneficiario->updated_at}}</h6>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js-content')

@endsection
