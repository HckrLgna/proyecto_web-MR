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
            <h2 class="formulario__label card-title">{{$informeAcademico->beneficiario->nombre}}</h2>



            <div class="formulario" id="formulario">



                <!-- Grupo: Grado Escolar -->
                <div class="formulario__grupo" id="grupo__grado">
                    <h5 for="grado_escolar" class="formulario__label">Grado Escolar</h5>
                    <h6>{{$informeAcademico->grado}}</h6>
                </div>

                <!-- Grupo: Nombre Colegio -->
                <div class="formulario__grupo" id="grupo__nombre_colegio">
                    <h5 for="nombre_colegio" class="formulario__label">Nombre Colegio</h5>
                    <h6>{{$informeAcademico->nombre_colegio}}</h6>
                </div>

                <!-- Grupo: Direccion Colegio -->
                <div class="formulario__grupo" id="grupo__direccion_colegio">
                    <h5 for="direccion_colegio" class="formulario__label">Dirección Colegio</h5>
                    <h6>{{$informeAcademico->direccion_colegio}}</h6>
                </div>



                <!-- Grupo: Desempeño -->
                <div class="formulario__grupo" id="grupo__desempeño">
                    <h5 for="desempeño" class="formulario__label">Desempeño</h5>
                    <h6>{{$informeAcademico->desempeño}}</h6>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('js-content')


@endsection
