<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $vehiculos = Vehiculo::all();

        return view('vehiculos.index', compact('vehiculos'));
    }

    public function altaOficial(Request $request)
    {
        // Obtener los datos del vehículo a partir de la petición
        $placa = $request->input('placa');

        // Crear un nuevo registro de vehículo en la tabla vehiculos
        $vehiculo = new Vehiculo;
        $vehiculo->placa = $placa;
        $vehiculo->tipo_vehiculo = 'oficial';
        $vehiculo->save();

        // Devolver una respuesta exitosa
        return response()->json(['mensaje' => 'Vehículo registrado exitosamente']);
    }

    public function verVehiculos($tipo = null)
    {
       if ($tipo) {
            $vehiculos = Vehiculo::where('tipo_vehiculo', $tipo)->get();
        } else {
            $vehiculos = Vehiculo::all();
        }
        return response()->json($vehiculos);
    }


    public function altaResidente (Request $request)
    {
        // Obtener los datos del vehículo a partir de la petición
        $placa = $request->input('placa');

        // Crear un nuevo registro de vehículo en la tabla vehiculos
        $vehiculo = new Vehiculo;
        $vehiculo->placa = $placa;
        $vehiculo->tipo_vehiculo = 'residente';
        $vehiculo->save();

        // Devolver una respuesta exitosa
        return response()->json(['mensaje' => 'Vehículo registrado exitosamente']);
    }


}
