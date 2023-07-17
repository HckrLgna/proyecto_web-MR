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

    <form action="" class="formulario" id="formulario">


        <!-- Grupo: Nombre -->
        <div class="formulario__grupo" id="grupo__nombre">
            <label for="nombre" class="formulario__label">Nombre</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="John Doe">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
        </div>

        <!-- Grupo: Fecha de Nacimiento -->
        <div class="formulario__grupo" id="grupo__fecha-nacimiento">
            <label for="nacimiento" class="formulario__label">Fecha de nacimiento</label>
            <div class="formulario__grupo-input">
                <input type="date" class="formulario__input" name="nacimiento" id="nacimiento" placeholder="John Doe">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
        </div>

        <!-- Grupo: Motivo -->
        <div class="formulario__grupo" id="grupo__grado">
            <label for="grado_escolar" class="formulario__label">Motivo</label>
            <div class="formulario__grupo-input">
                <select class="formulario__input" name="grado_escolar" id="grado_escolar">
                    <option value="0" selected>Seleccione el motivo</option>
                    <option value="1">Abandonado</option>
                    <option value="2">Escapó</option>
                    <option value="3">Extraviado</option>
                    <option value="4">Protección</option>
                </select>
            </div>
        </div>

        <!-- Grupo: Situación -->
        <div class="formulario__grupo" id="grupo__situacion">
            <label for="situacion" class="formulario__label">Situación</label>
            <textarea class="formulario__text-area" name="situacion" id="situacion" placeholder="Cómo se lo encontró?"></textarea>
            <p class="formulario__input-error">Rellene correctamente: solo puede contener numeros, letras y guion bajo.</p>
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
    <script src="{{ asset('style/form-beneficiario.js') }}"></script>

@endsection
