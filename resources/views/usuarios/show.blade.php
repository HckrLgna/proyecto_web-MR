@extends('layout.nav')

@section('css-content')


@endsection

@section('home-content')

    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Informes Académicos</span>
    </div>

    <!--    CONTENT    -->


    <div class="card text-center" data-bs-theme="light">
        <div class="card-body">
            <h2 class="formulario__label card-title">Jaimito</h2>



            <div class="formulario" id="formulario">



                <!-- Grupo: Grado Escolar -->
                <div class="formulario__grupo" id="grupo__grado">
                    <h5 for="grado_escolar" class="formulario__label">Grado Escolar</h5>

                </div>

                <!-- Grupo: Nombre Colegio -->
                <div class="formulario__grupo" id="grupo__nombre_colegio">
                    <h5 for="nombre_colegio" class="formulario__label">Nombre Colegio</h5>
                </div>

                <!-- Grupo: Direccion Colegio -->
                <div class="formulario__grupo" id="grupo__direccion_colegio">
                    <h5 for="direccion_colegio" class="formulario__label">Dirección Colegio</h5>
                </div>



                <!-- Grupo: Desempeño -->
                <div class="formulario__grupo" id="grupo__desempeño">
                    <h5 for="desempeño" class="formulario__label">Desempeño</h5>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('js-content')
    <script src="{{ asset('style/form-academico.js') }}"></script>

@endsection
