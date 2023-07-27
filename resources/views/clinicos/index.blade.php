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
        <span class="text">Fichas Clínicas</span>
    </div>

    <!--    CONTENT    -->
    <table class="table table-striped" id="usuarios"  data-bs-theme="light">
        <thead class="thead-inverse">
        <tr>
            <th>Nombre</th>
            <th>Doctor</th>
            <th>Fecha</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clinicos as $clinico)
            <tr>
                <td scope="row">{{$clinico->beneficiario->nombre}}</td>
                <td>{{$clinico->nombre_doctor}}</td>
                <td>{{$clinico->created_at}}</td>
                <td>
                    <a name="" id="" class="btn btn-info" href="{{route('fichaClinica.show',$clinico)}}" role="button">
                        <i class='bx bx-id-card'></i>
                    </a>
                    <a name="" id="" class="btn btn-primary" href="{{route('fichaClinica.edit',$clinico)}}" role="button">
                        <i class='bx bx-message-square-edit' ></i>
                    </a>
                    <a  href="{{ route('fichaClinica.destroy',$clinico) }}" name="" id="" class="btn btn-danger"  role="button"
                        onclick="event.preventDefault();
                                                     document.getElementById('destroy-form').submit();">
                        <i class='bx bx-message-square-x' ></i>
                    </a>

                    <form id="destroy-form" action="{{route('fichaClinica.destroy',$clinico)}}" method="post" class="d-none">
                        @csrf
                        @method('DELETE')

                    </form>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>


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
