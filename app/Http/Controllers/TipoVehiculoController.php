<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoVehiculo;

class TipoVehiculoController extends Controller
{
    //
    public function index()
    {
        $tipos_vehiculos = TipoVehiculo::all();

        return view('tipos_vehiculos.index', compact('tipos_vehiculos'));
    }

    public function create()
    {
        return view('tipos_vehiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $tipo_vehiculo = new TipoVehiculo([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion')
        ]);

        $tipo_vehiculo->save();

        return redirect('/tipos_vehiculos')->with('success', 'Tipo de vehículo agregado exitosamente!');
    }

    public function show($id)
    {
        $tipo_vehiculo = TipoVehiculo::find($id);

        return view('tipos_vehiculos.show', compact('tipo_vehiculo'));
    }

    public function edit($id)
    {
        $tipo_vehiculo = TipoVehiculo::find($id);

        return view('tipos_vehiculos.edit', compact('tipo_vehiculo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $tipo_vehiculo = TipoVehiculo::find($id);
        $tipo_vehiculo->nombre = $request->get('nombre');
        $tipo_vehiculo->descripcion = $request->get('descripcion');
        $tipo_vehiculo->save();

        return redirect('/tipos_vehiculos')->with('success', 'Tipo de vehículo actualizado exitosamente!');
    }

    public function destroy($id)
    {
        $tipo_vehiculo = TipoVehiculo::find($id);
        $tipo_vehiculo->delete();

        return redirect('/tipos_vehiculos')->with('success', 'Tipo de vehículo eliminado exitosamente!');
    }


}
