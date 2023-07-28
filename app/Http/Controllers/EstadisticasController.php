<?php

namespace App\Http\Controllers;

use App\Models\Alertas;
use App\Models\Beneficiario;
use App\Models\InformeEducador;
use App\Models\View;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    public function alertaIndex(){
        // Nombre de la página actual (puedes ajustar esto según tus necesidades)
        $nombrePagina = 'alerta.index';

        // Obtener el registro del contador de vistas para esta página
        $view = View::where('page_name', $nombrePagina)->first();

        // Si no existe el registro, crearlo
        if (!$view) {
            $view = View::create([
                'page_name' => $nombrePagina,
                'count' => 0,
            ]);
        }

        // Incrementar el contador
        $view->increment('count');

        $alertas = Alertas::all();

        $puntos =[];
        foreach ($alertas as $alerta){
            $puntos[] = ['name' => $alerta->titulo, 'y' => floatval($alerta->estado)];
        }
        return view('estadisticas.index_alerta',[
            'data' => json_encode($puntos),
            'contador' => $view->count
        ]);
    }

    public function informeEducadorIndex(){
        // Nombre de la página actual (puedes ajustar esto según tus necesidades)
        $nombrePagina = 'informeEducadorestadistica.index';

        // Obtener el registro del contador de vistas para esta página
        $view = View::where('page_name', $nombrePagina)->first();

        // Si no existe el registro, crearlo
        if (!$view) {
            $view = View::create([
                'page_name' => $nombrePagina,
                'count' => 0,
            ]);
        }

        // Incrementar el contador
        $view->increment('count');

        $beneficiarios = Beneficiario::with('informesEducadores')->get();

        $series = [];
        foreach ($beneficiarios as $beneficiario) {
            $nombreBeneficiario = $beneficiario->nombre;
            //dd($beneficiario->informesEducadores->pluck('evaluacion')->toArray());
            $evaluaciones = $beneficiario->informesEducadores->pluck('evaluacion')->map(function ($valor) {
                return floatval($valor);
            })->toArray();

            $series[] = [
                'name' => $nombreBeneficiario,
                'data' => $evaluaciones,
            ];
        }

        return view('estadisticas.index_informe_educador',[
            'series'=>json_encode($series),
            'contador' => $view->count,
        ]);
    }


}
