@extends('layout.nav')

@section('css-content')

    <link rel="stylesheet" href="{{ asset('/style/form-style.css') }}">

@endsection

@section('home-content')

    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Fichas Clínicas</span>
    </div>

    <!--    CONTENT    -->
    <div class="card text-center" data-bs-theme="light">
        <div class="card-body">

            <!-- Beneficiario -->
            <h2 class="formulario__label card-title">{{$fichaClinica->beneficiario->nombre}}</h2>



            <div class="formulario" id="formulario">

                <!-- Grupo: Nombre Doctor -->
                <div class="formulario__grupo" id="grupo__nombre_colegio">
                    <h5 class="formulario__label">Nombre Doctor</h5>
                    <h6>{{$fichaClinica->nombre_doctor}}</h6>
                </div>

                <!-- Grupo: Especialidad -->
                <div class="formulario__grupo" id="grupo__grado">
                    <h5 class="formulario__label">Especialidad</h5>
                    <h6>Info</h6>

                </div>

                <!-- Grupo: Motivo -->
                <div class="formulario__grupo" id="grupo__direccion_colegio">
                    <h5 class="formulario__label">Motivo</h5>
                    <h6>{{$fichaClinica->motivo}}</h6>
                </div>



                <!-- Grupo: Prescripcion -->
                <div class="formulario__grupo" id="grupo__desempeño">
                    <h5 class="formulario__label">Prescripción</h5>
                    <h6>{{$fichaClinica->prescripcion_medica}}</h6>
                </div>

                <!-- Grupo: Observaciones -->
                <div class="formulario__grupo" id="grupo__desempeño">
                    <h5 class="formulario__label">Observaciones</h5>
                    <h6>{{$fichaClinica->observaciones}}</h6>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('js-content')
    <script src="{{ asset('style/form-academico.js') }}"></script>

@endsection
