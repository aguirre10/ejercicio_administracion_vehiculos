<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Estancia;
use App\Models\Vehiculo;
use Laracsv\Export;


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
    public function registrarSalida(Request $request)
    {
        $placa = $request->input('placa');
        $horaSalida = $request->input('hora_salida');

        // Validación para asegurarse de que la placa existe en la tabla Estancia
        $estancia = Estancia::where('placa', $placa)->first();
        if (!$estancia) {
            return response()->json(['error' => 'El vehículo con placa ' . $placa . ' no ha sido registrado en la tabla Estancia'], 400);
        }

        // Validación para asegurarse de que la placa existe en la tabla Vehiculos
        $vehiculo = Vehiculo::where('placa', $placa)->first();
        if (!$vehiculo) {
            return response()->json(['error' => 'El vehículo con placa ' . $placa . ' no ha sido registrado en la tabla Vehiculos'], 400);
        }

        // Cálculo de la diferencia de tiempo en minutos
        $horaEntrada = $estancia->hora_entrada;
        $diferencia = $horaSalida->diffInMinutes($horaEntrada);

        // Verificación del tipo de vehículo
        $tipoVehiculo = $vehiculo->id_tipo_vehiculo;
        if ($tipoVehiculo == 1) { // Vehículo residente
            $pago = $diferencia * 0.05;
            $pagoAcumulado = $estancia->pago_acumulado + $pago;
            $estancia->pago = $pago;
            $estancia->pago_acumulado = $pagoAcumulado;
        } elseif ($tipoVehiculo == 2) { // Vehículo oficial
            $estancia->pago = 0;
        } else { // Vehículo no residente
            $pago = $diferencia * 0.5;
            $estancia->pago = $pago;
        }

        // Modificación de la estancia
        $estancia->hora_salida = $horaSalida;
        $estancia->estado = "ACTIVO";
        $estancia->save();

        return response()->json(['message' => 'El registro de salida se ha realizado con éxito'], 200);
    }
    public function comienzaMes(Request $request)
    {
        $placas = Estancia::where('estado', 'Activo')->pluck('placa');
        foreach ($placas as $placa) {
            $vehiculo = Vehiculo::where('placa', $placa)->first();
            if ($vehiculo->tipo_vehiculo == "Residente") {
                $estancia = Estancia::where('placa', $placa)->first();
                $estancia->estado = "Inactivo";
                $estancia->save();
            }
        }
        return response()->json(['message' => 'Se ha comenzado un nuevo mes'], 200);
    }

    public function pagoResidentes($nombreArchivo)
    {
        // Consultar todos los registros de la tabla estancia con estado "ACTIVO"
        $estancias = Estancia::where('estado', 'ACTIVO')->get();

        // Arreglo para guardar los datos del archivo
        $datos = [];

        // Recorrer todas las estancias
        foreach ($estancias as $estancia) {
            // Consultar la información del vehiculo
            $vehiculo = Vehiculo::where('placa', $estancia->placa)->first();

            // Verificar si el vehiculo es residente
            if ($vehiculo->tipo_vehiculo == 'Residente') {
                // Calcular el tiempo estacionado en minutos
                $tiempoEstacionado = $estancia->pago_acumulado / 0.05;

                // Agregar los datos al arreglo
                $datos[] = [
                    'placa' => $estancia->placa,
                    'tiempo_estacionado' => $tiempoEstacionado,
                    'cantidad_a_pagar' => $estancia->pago_acumulado
                ];
            }
        }

        // Crear el archivo
        $file = fopen($nombreArchivo . '.csv', 'w');

        // Escribir los encabezados del archivo
        fputcsv($file, ['placa', 'tiempo_estacionado', 'cantidad_a_pagar']);

        // Escribir los datos en el archivo
        foreach ($datos as $dato) {
            fputcsv($file, $dato);
        }

        // Cerrar el archivo
        fclose($file);

        // Retornar la ruta del archivo creado
        return $nombreArchivo . '.csv';
    }

}
