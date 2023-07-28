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


    <div class="card text-center"  id="usuarios" data-bs-theme="light">
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

                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Nuevo ingreso
                    </button>
                </div>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Registra nuevo ingreso</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="send-form" action="{{route('beneficiario.ingresoStore')}}" method="post" class="formulario" id="formulario">
                                    @csrf
                                    <!-- Grupo: Nombre -->
                                    <div class="formulario__grupo" id="grupo__estado">
                                        <label for="estado" class="formulario__label">Estado</label>
                                        <div class="formulario__grupo-input">
                                            <input type="text" class="formulario__input" name="estado" id="estado" placeholder="Saludable">
                                        </div>
                                    </div>
                                    <div class="formulario__grupo" id="grupo__fecha-ingreso">
                                        <label for="fecha" class="formulario__label">Fecha de ingreso</label>
                                        <div class="formulario__grupo-input">
                                            <input type="date" class="formulario__input" name="fecha_ingreso" id="fecha">
                                        </div>
                                    </div>
                                    <input name="id_beneficiario" value="{{$beneficiario->id}}" type="hidden">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary"> <a  href="{{ route('beneficiario.ingresoStore') }}"
                                                                                   onclick="event.preventDefault();
                                                     document.getElementById('send-form').submit();">
                                        Registrar
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
            <h2 class="card-title">Detalles de ingresos</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="usuarios"  data-bs-theme="light">
                <thead class="thead-inverse">
                <tr>
                    <th>Fecha </th>
                    <th>Estado </th>
                </tr>
                </thead>
                <tbody>
                @foreach($beneficiario->datosIngreso as $dato)
                    <tr>
                        <td scope="row">{{$dato->fecha_ingreso}}</td>
                        <td>{{$dato->estado}}</td>

                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection

@section('js-content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endsection
