<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Estancia;
use App\Models\Vehiculo;

class EstanciaController extends Controller
{
    //
    public function index()
    {
        $estancias = Estancia::all();

        return view('estancias.index', compact('estancias'));
    }

    public function registrarEntrada(Request $request)
    {
        $placa = $request->input('placa');
        $hora_entrada = now();

        $estancia = Estancia::where('placa', $placa)->first();
        $vehiculo = Vehiculo::where('placa', $placa)->first();

        if ($estancia && $vehiculo && $vehiculo->tipo_vehiculo == "Residente") {
            $estancia->hora_entrada = $hora_entrada;
            $estancia->save();

            return response()->json($estancia);
        } else {
            $estancia = new Estancia;
            $estancia->placa = $placa;
            $estancia->estado = 'Activo';
            $estancia->hora_entrada = $hora_entrada;
            $estancia->save();

            return response()->json($estancia);
        }
    }




}
