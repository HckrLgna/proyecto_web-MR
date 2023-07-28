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

    <form action="{{route('informeEducador.update',$informeEducador)}}" method="post" class="formulario" id="formulario">
    @csrf
    @method('PUT')


        <!-- Grupo: Nombre -->
        <div class="formulario__grupo" id="grupo__nombre">
            <label for="nombre" class="formulario__label">Nombre Beneficiario</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="fullname" id="nombre" value="{{$informeEducador->beneficiario->nombre}}"  >
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El nombre tiene que ser de hasta 40 dígitos y solo puede contener letras.</p>
        </div>

        <!-- Grupo: Evaluacion -->
        <div class="formulario__grupo" id="grupo__beneficiario">
            <label for="evaluacion" class="formulario__label">Evaluación</label>
            <div class="formulario__grupo-input">
                <select class="formulario__input" name="evaluacion" id="evaluacion">
                    <option value="0" selected>Seleccionar evauación</option>
                    <option value="100">Bueno</option>
                    <option value="50">Regular</option>
                    <option value="10">Malo</option>
                </select>
            </div>
        </div>

        <!-- Grupo: Descripcion -->
        <div class="formulario__grupo" id="grupo__descripcion">
            <label for="descripcion" class="formulario__label">Descripción</label>
            <textarea class="formulario__text-area" name="descripcion" id="descripcion"  >{{$informeEducador->descripcion}}</textarea>
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
