<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> miRancho </title>
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/light.css') }}" id="theme">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    @yield('css-content')

    <!-- DATATABLE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="sidebar close">
    <div class="logo-details">
        <i class='bx bx-buildings' id="logo"></i>
        <span class="logo_name">miRancho</span>
    </div>
    <ul class="nav-links">
        @if( Auth::user()->role_id == 1 )
            <li>
                <div class="iocn-link">
                    <a href="{{route('user.index')}}">
                        <i class='bx bx-user'></i>
                        <span class="link_name">Usuario</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{route('user.index')}}">Usuario</a></li>
                    <li><a href="{{route('user.create')}}">Crear</a></li>
                    <li><a href="{{route('user.index')}}">Listar</a></li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->role_id ==1 || Auth::user()->role_id == 2)
                <li>
                    <a href="#">
                        <i class='bx bx-user'></i>
                        <span class="link_name">Director</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Director</a></li>
                    </ul>
                </li>
        @endif

        @if(Auth::user()->role_id ==1 || Auth::user()->role_id ==3)
                <li>
                    <div class="iocn-link">
                        <a href="{{route('informeEducador.index')}}">
                            <i class='bx bx-group'></i>
                            <span class="link_name">Educador</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>

                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Educador</a></li>
                        <li><a href="{{route('informeEducador.create')}}">Crear informe</a></li>
                    </ul>
                </li>

        @endif

        <li>
            <div class="iocn-link">
                <a href="{{route('beneficiario.index')}}">
                    <i class='bx bx-star'></i>
                    <span class="link_name">Beneficiario</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Beneficiario</a></li>
                <li><a href="{{route('beneficiario.create')}}">Crear</a></li>
                <li><a href="{{route('beneficiario.index')}}">Listar</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="{{route('informeAcademico.index')}}">
                    <i class='bx bxs-school'></i>
                    <span class="link_name">Académico</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Académico</a></li>
                <li><a href="{{route('informeAcademico.create')}}">Crear</a></li>
                <li><a href="{{route('informeAcademico.index')}}">Listar</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="{{route('fichaClinica.index')}}">
                    <i class='bx bx-heart'></i>
                    <span class="link_name">Clínico</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Clínico</a></li>
                <li><a href="{{route('fichaClinica.create')}}">Crear</a></li>
                <li><a href="{{route('fichaClinica.index')}}">Listar</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Informe</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Informe</a></li>
                <li><a href="#">Crear</a></li>
                <li><a href="#">Listar</a></li>
            </ul>
        </li>
            @if(Auth::user()->role_id ==1)
                <li>
                    <div class="iocn-link">
                        <a href="{{route('estadisticas.index')}}">
                            <i class='bx bx-pie-chart-alt-2'></i>
                            <span class="link_name">Estadísticas</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="{{route('estadisticas.index')}}">Estadísticas</a></li>
                        <li><a href="{{route('estadisticas_alerta.index')}}">Alertas</a></li>
                        <li><a href="{{route('estadisticas_informe_educador.index')}}">Informe Educador</a></li>
                    </ul>
                </li>

            @endif

        <li>
            <a href="#" id="btn-change-theme">
                <i class='fas fa-moon'></i>
                <span class="link_name">Night</span>
            </a>
            <ul class="sub-menu blank" id="menu-mode">
                <li><a class="link_name" href="#">Night</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="{{ asset('style/profile.jpg') }}" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name">{{substr(Auth()->user()->fullname, 0,13) }}</div>
                    <div class="job">{{ Auth()->user()->rol->nombre}}</div>
                </div>
                <a  href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out'></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </li>
    </ul>

    <!--    HOME SECTION    -->
</div>
<section class="home-section">

    @yield('home-content')
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        @yield('footer')
    </footer>
</section>



@yield('js-content')


<script src="{{ asset('/style/script.js') }}"></script>



</script>

</body>
</html>
