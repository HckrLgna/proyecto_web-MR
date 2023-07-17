@extends('layout.nav')

@section('css-content')

    <link rel="stylesheet" href="{{ asset('/style/form-style.css') }}">
@endsection

@section('home-content')

    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Informes Educador</span>
    </div>

    <!--    CONTENT    -->

    <form action="" class="formulario" id="formulario">

        <!-- Grupo: Beneficiario -->
        <div class="formulario__grupo" id="grupo__beneficiario">
            <label for="beneficiario" class="formulario__label">Beneficiario</label>
            <div class="formulario__grupo-input">
                <select class="formulario__input" name="beneficiario" id="beneficiario">
                    <option value="0" selected>Seleccionar beneficiario</option>
                    <!-- Listar beneficiarios -->
                    <option value="1">Jaimito</option>
                    <option value="2">Carlitos</option>
                    <!-- *********************** -->
                </select>
            </div>
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
    <script src="{{ asset('style/form-informe.js') }}"></script>

@endsection
