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

    <form action="{{route('fichaClinica.store')}}" method="post" class="formulario" id="formulario">
    @csrf
        <!-- Grupo: Beneficiario -->
        <div class="formulario__grupo" id="grupo__beneficiario">
            <label for="beneficiario" class="formulario__label">Beneficiario</label>
            <div class="formulario__grupo-input">
                <select class="formulario__input" name="beneficiario" id="beneficiario">
                    <option value="0" selected>Seleccionar beneficiario</option>
                    <!-- Listar beneficiarios -->
                    @foreach($beneficiarios as $beneficiario)
                        <option value="{{$beneficiario->id}}">{{$beneficiario->nombre}}</option>
                    @endforeach
                    <!-- *********************** -->
                </select>
            </div>
        </div>

        <!-- Grupo: Nombre Doctor -->
        <div class="formulario__grupo" id="grupo__nombre_doctor">
            <label for="nombre_doctor" class="formulario__label">Nombre Doctor</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="nombre_doctor" id="nombre_doctor" placeholder="John Doe">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Rellene correctamente; solo puede contener numeros, letras y guion bajo.</p>
        </div>

        <!-- Grupo: Motivo -->
        <div class="formulario__grupo" id="grupo__motivo">
            <label for="motivo" class="formulario__label">Motivo</label>
            <textarea class="formulario__text-area" name="motivo" id="motivo" placeholder="Cómo se lo encontró?"></textarea>
            <p class="formulario__input-error">Rellene correctamente; solo puede contener numeros, letras y guion bajo.</p>
        </div>

        <!-- Grupo: Prescripcion -->
        <div class="formulario__grupo" id="grupo__prescripcion">
            <label for="prescripcion" class="formulario__label">Prescripción</label>
            <textarea class="formulario__text-area" name="prescripcion_med" id="prescripcion" placeholder="Cómo se lo encontró?"></textarea>
            <p class="formulario__input-error">Rellene correctamente; solo puede contener numeros, letras y guion bajo.</p>
        </div>

        <!-- Grupo: Observaciones -->
        <div class="formulario__grupo" id="grupo__pbservaciones">
            <label for="observaciones" class="formulario__label">Observaciones</label>
            <textarea class="formulario__text-area" name="observaciones" id="observaciones" placeholder="Cómo se lo encontró?"></textarea>
            <p class="formulario__input-error">Rellene correctamente; solo puede contener numeros, letras y guion bajo.</p>
        </div>

        <div class="formulario__mensaje" id="formulario__mensaje">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
        </div>

        <div class="formulario__grupo formulario__grupo-btn-enviar">
            <button type="submit" class="formulario__btn">Enviar</button>
            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
        </div>
    </form>
@endsection

@section('js-content')
    <script src="{{ asset('style/form-clinico.js') }}"></script>

@endsection
