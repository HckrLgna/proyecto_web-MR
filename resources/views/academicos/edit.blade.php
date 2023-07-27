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

    <form action="{{route('informeAcademico.update',$informeAcademico)}}" method="post" class="formulario" id="formulario">
        @csrf
        @method('PUT')
        <!-- Grupo: Beneficiario -->
        <div class="formulario__grupo" id="grupo__nombre_beneficiario">
            <label for="nombre_beneficiario" class="formulario__label">Nombre Beneficiario</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="nombre_beneficiario" id="nombre_beneficiario" value="{{$informeAcademico->beneficiario->nombre}}">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Rellene correctamente; solo puede contener numeros, letras y guion bajo.</p>
        </div>

        <!-- Grupo: Grado Escolar -->
        <div class="formulario__grupo" id="grupo__grado">
            <label for="grado_escolar" class="formulario__label">Grado Escolar</label>
            <div class="formulario__grupo-input">
                <select class="formulario__input" name="grado_escolar" id="grado_escolar">
                    <option value="0" selected>Seleccione el grado</option>
                    <option value="1p">Primaria: 1</option>
                    <option value="2p">Primaria: 2</option>
                    <option value="3p">Primaria: 3</option>
                    <option value="4p">Primaria: 4</option>
                    <option value="5p">Primaria: 5</option>
                    <option value="6p">Primaria: 6</option>
                    <option value="1s">Secundaria: 1</option>
                    <option value="2s">Secundaria: 2</option>
                    <option value="3s">Secundaria: 3</option>
                    <option value="4s">Secundaria: 4</option>
                    <option value="5s">Secundaria: 5</option>
                    <option value="6s">Secundaria: 6</option>
                </select>
            </div>
        </div>

        <!-- Grupo: Nombre Colegio -->
        <div class="formulario__grupo" id="grupo__nombre_colegio">
            <label for="nombre_colegio" class="formulario__label">Nombre Colegio</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="nombre_colegio" id="nombre_colegio" value="{{$informeAcademico->nombre_colegio}}">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Rellene correctamente; solo puede contener numeros, letras y guion bajo.</p>
        </div>

        <!-- Grupo: Direccion Colegio -->
        <div class="formulario__grupo" id="grupo__direccion_colegio">
            <label for="direccion_colegio" class="formulario__label">Dirección Colegio</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="direccion_colegio" id="direccion_colegio" value="{{$informeAcademico->direccion_colegio}}">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Rellene correctamente; solo puede contener numeros, letras y guion bajo.</p>
        </div>



        <!-- Grupo: Desempeño -->
        <div class="formulario__grupo" id="grupo__desempeño">
            <label for="desempeño" class="formulario__label">Desempeño</label>
            <textarea class="formulario__text-area" name="desempeño" id="desempeño" >{{$informeAcademico->desempeño}}</textarea>
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
   <!-- revisar los roles en ese scrpit-->

@endsection
