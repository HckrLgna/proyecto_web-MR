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

    <form action="{{route('informeEducador.store')}}" method="post" class="formulario" id="formulario">
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
            <textarea class="formulario__text-area" name="descripcion" id="descripcion" placeholder="Redacte su evaluación"></textarea>
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
