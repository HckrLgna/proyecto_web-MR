@extends('layout.nav')

@section('css-content')

    <link rel="stylesheet" href="{{ asset('/style/form-style.css') }}">

@endsection

@section('home-content')

    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Usuarios</span>
    </div>

    <!--    CONTENT    -->


    <div class="card text-center" data-bs-theme="light">
        <div class="card-body">

            <!-- Nombre -->
            <h2 class="formulario__label card-title">Irren Ma</h2>



            <div class="formulario" id="formulario">

                <!-- Grupo: Correo -->
                <div class="formulario__grupo" id="grupo__nombre_colegio">
                    <h5 for="nombre_colegio" class="formulario__label">Correo</h5>
                    <h6>Info</h6>
                </div>

                <!-- Grupo: CI -->
                <div class="formulario__grupo" id="grupo__direccion_colegio">
                    <h5 for="direccion_colegio" class="formulario__label">CI</h5>
                    <h6>Info</h6>
                </div>



                <!-- Grupo: Ocupación -->
                <div class="formulario__grupo" id="grupo__desempeño">
                    <h5 for="desempeño" class="formulario__label">Ocupación</h5>
                    <h6>Info</h6>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('js-content')
    <script src="{{ asset('style/form-academico.js') }}"></script>

@endsection
