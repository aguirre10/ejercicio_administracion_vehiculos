<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    //
    public function index()
    {
        $empleados = Empleado::all();

        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->save();
        return redirect()->route('empleados.index')->with('success', 'Empleado creado con éxito');
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);
        return view('empleados.show', compact('empleado'));
    }

    public function edit($id)
    {
        $empleado = Empleado::find($id);
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->save();
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado con éxito');
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado con éxito');
    }


}
