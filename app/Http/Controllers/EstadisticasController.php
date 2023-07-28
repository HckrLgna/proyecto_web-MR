<?php

namespace App\Http\Controllers;

use App\Models\Alertas;
use App\Models\Beneficiario;
use App\Models\InformeEducador;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    public function alertaIndex(){
        $alertas = Alertas::all();

        $puntos =[];
        foreach ($alertas as $alerta){
            $puntos[] = ['name' => $alerta->titulo, 'y' => floatval($alerta->estado)];
        }
        return view('estadisticas.index_alerta',['data' => json_encode($puntos)]);
    }

    public function informeEducadorIndex(){
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

        return view('estadisticas.index_informe_educador',['series'=>json_encode($series)]);
    }


}
