@extends('layout.nav')

@section('css-content')
    <!-- DATATABLE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

@endsection

@section('home-content')
    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Beneficiarios</span>
    </div>

    <!--    CONTENT    -->
    <table class="table table-striped" id="usuarios"  data-bs-theme="light">
        <thead class="thead-inverse">
        <tr>
            <th>Nombre</th>
            <th>Motivo</th>
            <th>Fecha</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($beneficiarios as $beneficiario)
            <tr>
                <td scope="row">{{$beneficiario->nombre}}</td>
                <td>{{$beneficiario->situacion}}</td>
                <td>{{$beneficiario->fecha_nacimiento}} </td>
                <td>
                    <a name="" id="" class="btn btn-info" href="{{route('beneficiario.show',$beneficiario)}}" role="button">
                        <i class='bx bx-id-card'></i>
                    </a>
                    <a id="" class="btn btn-primary" href="{{route('beneficiario.edit',$beneficiario)}}" role="button">
                        <i class='bx bx-message-square-edit' ></i>
                    </a>

                    <a id="" class="btn btn-danger" href="{{route('beneficiario.update',$beneficiario)}}" role="button"
                        onclick="event.preventDefault(); document.getElementById('update-form').submit();">
                        <i class='bx bx-message-square-x' ></i>
                    </a>
                    <form id="update-form" action="{{ route('beneficiario.update',$beneficiario) }}" method="POST" class="d-none">
                        @csrf
                        @method('PUT')
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
@section('footer')


    <p class="col-md-4 mb-0 text-body-secondary">© 2023 Mi rancho</p>

    <a href="#" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <p class="col-md-4 mb-0 text-body-secondary">Cantidad de visitas a la pagina: {{$contador}}</p>
    </a>

    <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
    </ul>

@endsection
@section('js-content')
    <!-- DATATABLE -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
        new DataTable('#usuarios', {
            responsive: true,
            autoWidth: false,
        });
    </script>
@endsection
