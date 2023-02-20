<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;

class PagoController extends Controller
{
    //
    public function index()
    {
        $pagos = Pago::all();

        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        return view('pagos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'importe' => 'required',
            'fecha_pago' => 'required',
        ]);

        $pago = new Pago([
            'importe' => $request->get('importe'),
            'fecha_pago' => $request->get('fecha_pago'),
        ]);

        $pago->save();

        return redirect('/pagos')->with('success', 'Pago registrado exitosamente.');
    }

    public function show(Pago $pago)
    {
        return view('pagos.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        return view('pagos.edit', compact('pago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'importe' => 'required',
            'fecha_pago' => 'required',
        ]);

        $pago->importe = $request->get('importe');
        $pago->fecha_pago = $request->get('fecha_pago');
        $pago->save();

        return redirect('/pagos')->with('success', 'Pago actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */

    public function destroy(Pago $pago)
    {
        $pago->delete();

        return redirect('/pagos')->with('success', 'Pago eliminado exitosamente.');
    }




}
