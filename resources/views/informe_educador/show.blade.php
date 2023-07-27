@extends('layout.nav')

@section('css-content')

    <link rel="stylesheet" href="{{ asset('/style/form-style.css') }}">

@endsection

@section('home-content')

    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Informes Académicos</span>
    </div>

    <!--    CONTENT    -->


    <div class="card text-center" data-bs-theme="light">
        <div class="card-body">

            <!-- Beneficiario -->
            <h2 class="formulario__label card-title">Jaimito</h2>



            <div class="formulario" id="formulario">



                <!-- Grupo: Evaluacion -->
                <div class="formulario__grupo" id="grupo__grado">
                    <h5 class="formulario__label">Evaluación</h5>
                    <h6>Info</h6>
                </div>

                <!-- Grupo: Descripcion -->
                <div class="formulario__grupo" id="grupo__nombre_colegio">
                    <h5 class="formulario__label">Descripción</h5>
                    <h6>Info</h6>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js-content')
    <script src="{{ asset('style/form-academico.js') }}"></script>

@endsection
