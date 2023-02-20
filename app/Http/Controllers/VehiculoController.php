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
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required',
            'estado' => 'required',
            'id_tipo_vehiculo' => 'required'
        ]);

        $vehiculo = new Vehiculo([
            'placa' => $request->get('placa'),
            'estado' => $request->get('estado'),
            'id_tipo_vehiculo' => $request->get('id_tipo_vehiculo')
        ]);

        $vehiculo->save();

        return redirect('/vehiculos')->with('success', 'Vehículo agregado exitosamente!');
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);

        return view('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);

        return view('vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'placa' => 'required',
            'estado' => 'required',
            'id_tipo_vehiculo' => 'required'
        ]);

        $vehiculo = Vehiculo::find($id);
        $vehiculo->placa = $request->get('placa');
        $vehiculo->estado = $request->get('estado');
        $vehiculo->id_tipo_vehiculo = $request->get('id_tipo_vehiculo');
        $vehiculo->save();

        return redirect('/vehiculos')->with('success', 'Vehículo actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();

        return redirect('/vehiculos')->with('success', 'Vehículo eliminado exitosamente!');
    }

}
