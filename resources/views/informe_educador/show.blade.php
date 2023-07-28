@extends('layout.nav')

@section('css-content')

    <link rel="stylesheet" href="{{ asset('/style/form-style.css') }}">

@endsection

@section('home-content')

    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Informe Educador</span>
    </div>

    <!--    CONTENT    -->


    <div class="card text-center" data-bs-theme="light">
        <div class="card-body">

            <!-- Beneficiario -->
            <h2 class="formulario__label card-title">{{$informeEducador->beneficiario->nombre}}</h2>
            <div class="formulario" id="formulario">
                <!-- Grupo: Evaluacion -->
                <div class="formulario__grupo" id="grupo__grado">
                    <h5 class="formulario__label">Evaluación</h5>
                    <h6>{{$informeEducador->evaluacion}}</h6>
                </div>

                <!-- Grupo: Descripcion -->
                <div class="formulario__grupo" id="grupo__nombre_colegio">
                    <h5 class="formulario__label">Descripción</h5>
                    <h6>{{$informeEducador->descripcion}}</h6>
                </div>
                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Crear Alerta
                    </button>
                </div>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Registra nueva alerta</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="send-form" action="{{route('informeEducador.alertaStore')}}" method="post" class="formulario" id="formulario">
                                    @csrf
                                    <!-- Grupo: Nombre -->
                                    <div class="formulario__grupo" id="grupo__nombre">
                                        <label for="nombre" class="formulario__label">Titulo</label>
                                        <div class="formulario__grupo-input">
                                            <input type="text" class="formulario__input" name="titulo" id="nombre" placeholder="ingrese el titulo"  >
                                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                        </div>
                                        <p class="formulario__input-error">El nombre tiene que ser de hasta 40 dígitos y solo puede contener letras.</p>
                                    </div>

                                    <!-- Grupo: Evaluacion -->
                                    <div class="formulario__grupo" id="grupo__beneficiario">
                                        <label for="evaluacion" class="formulario__label">Estado</label>
                                        <div class="formulario__grupo-input">
                                            <select class="formulario__input" name="estado" id="evaluacion">
                                                <option value="0" selected>Seleccionar estado</option>
                                                <option value="10">Moderado</option>
                                                <option value="50">Regular</option>
                                                <option value="100">Urgente</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Grupo: Descripcion -->
                                    <div class="formulario__grupo" id="grupo__descripcion">
                                        <label for="descripcion" class="formulario__label">Detalle</label>
                                        <textarea class="formulario__text-area" name="detalle" id="descripcion" placeholder="Ingrese descripcion" > </textarea>
                                        <p class="formulario__input-error">Rellene correctamente; solo puede contener numeros, letras y guion bajo.</p>
                                    </div>
                                    <input name="id_informe_educador" value="{{$informeEducador->id }}" type="hidden">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary"> <a  href="{{ route('informeEducador.alertaStore') }}"
                                                                                   onclick="event.preventDefault();
                                                     document.getElementById('send-form').submit();">
                                        Crear
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="card text-center" data-bs-theme="light">
        <div class="card-header">
            <h2 class="card-title">Registro de alertas</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="usuarios"  data-bs-theme="light">
                <thead class="thead-inverse">
                <tr>
                    <th>Titulo </th>
                    <th>Fecha </th>
                    <th>Detalle </th>
                    <th>Estado </th>
                </tr>
                </thead>
                <tbody>
                @foreach($informeEducador->alertas as $dato)
                    <tr>
                        <td scope="row">{{$dato->titulo}}</td>
                        <td>{{$dato->fecha}}</td>
                        <td>{{$dato->detalle}}</td>
                        <td>{{$dato->estado}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection

@section('js-content')
    <script src="{{ asset('style/form-academico.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endsection
