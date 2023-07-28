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
        <span class="text">Usuarios</span>
    </div>

    <!--    CONTENT    -->
    <table class="table table-striped" id="usuarios"  data-bs-theme="light">
        <thead class="thead-inverse">
        <tr>
            <th>Nombre</th>
            <th>CI</th>
            <th>Rol</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td scope="row">{{$user->fullname}}</td>
                <td>{{$user->ci}}</td>
                @foreach($roles as $role)
                    @if($role->id == $user->role_id)
                        <td>{{$role->nombre}}</td>
                    @endif
                @endforeach
                <td>
                    <a name="" id="" class="btn btn-info" href="{{route('user.show',$user)}}" role="button">
                        <i class='bx bx-id-card'></i>
                    </a>
                    <a name="" id="" class="btn btn-primary" href="{{route('user.edit',$user)}}" role="button">
                        <i class='bx bx-message-square-edit' ></i>
                    </a>
                    <a name="" id="" class="btn btn-danger" type="submit" role="button">
                        <i class='bx bx-message-square-x' ></i>
                    </a>
                    <form action="{{route('user.destroy',$user)}}" method="post">
                        @csrf
                        @method('DELETE')


                    </form>

                </td>
            </tr>
        @endforeach()

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
