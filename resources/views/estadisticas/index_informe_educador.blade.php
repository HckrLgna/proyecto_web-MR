@extends('layout.nav')

@section('css-content')

    <link rel="stylesheet" href="{{ asset('/style/form-style.css') }}">

@endsection

@section('home-content')

    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Estadisticas de datos</span>
    </div>

    <!--    CONTENT    -->
    <div class="card text-center" data-bs-theme="light">
        <div class="card-body">

            <!-- Beneficiario -->
            <h2 class="formulario__label card-title">Estadisticas de desempeño de acuerdo al Informe educador</h2>
            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <div id="container"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js-content')
    <script src="{{ asset('style/form-academico.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        // Data retrieved https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature
        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Tasa de rendimiento y adaptacion'
            },
            subtitle: {
                text: 'Informe modelo: ' +
                    '<a href="{{route('informeEducador.index')}}" ' +
                    'target="_blank">informe educador</a>'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Rendimiento'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: <?= $series ?>
        });


    </script>
@endsection
