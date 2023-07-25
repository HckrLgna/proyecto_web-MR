@extends('layout.nav')

@section('css-content')

    <link rel="stylesheet" href="{{ asset('/style/form-style.css') }}">
@endsection

@section('home-content')

    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Usuarios</span>
    </div>

    <!--    CONTENT    -->

    <form method="POST" action="{{route('user.store')}}" class="formulario" id="formulario">
    @csrf

        <!-- Grupo: Nombre -->
        <div class="formulario__grupo" id="grupo__nombre">
            <label for="nombre" class="formulario__label">Nombre</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="fullname" id="nombre" placeholder="John Doe">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El nombre tiene que ser de hasta 40 dígitos y solo puede contener letras.</p>
        </div>

        <!-- Grupo: Correo Electronico -->
        <div class="formulario__grupo" id="grupo__correo">
            <label for="correo" class="formulario__label">Correo Electrónico</label>
            <div class="formulario__grupo-input">
                <input type="email" class="formulario__input" name="email" id="correo" placeholder="correo@correo.com">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
        </div>

        <!-- Grupo: Contraseña -->
        <div class="formulario__grupo" id="grupo__password">
            <label for="password" class="formulario__label">Contraseña</label>
            <div class="formulario__grupo-input">
                <input type="password" class="formulario__input" name="password" id="password">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
        </div>

        <!-- Grupo: Contraseña 2 -->
        <div class="formulario__grupo" id="grupo__password2">
            <label for="password2" class="formulario__label">Repetir Contraseña</label>
            <div class="formulario__grupo-input">
                <input type="password" class="formulario__input" name="password2" id="password2">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
        </div>



        <!-- Grupo: Cedula de Identidad -->
        <div class="formulario__grupo" id="grupo__ci">
            <label for="ci" class="formulario__label">CI</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="ci" id="ci" placeholder="9216524">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El CI solo puede contener numeros.</p>
        </div>

        <!-- Grupo: Rol -->
        <div class="formulario__grupo" id="grupo__rol">
            <label for="rol" class="formulario__label">Ocupación</label>
            <div class="formulario__grupo-input">
                <select class="formulario__input" name="role_id" id="rol">
                    <option value="0" selected>Sin seleccionar</option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->nombre}}</option>

                    @endforeach()
                </select>
            </div>
            <p class="formulario__input-error">El CI solo puede contener numeros.</p>
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


@endsection
