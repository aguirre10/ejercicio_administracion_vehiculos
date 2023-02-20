<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Estancia;

class EstanciaController extends Controller
{
    //
    public function index()
    {
        $estancias = Estancia::all();

        return view('estancias.index', compact('estancias'));
    }

    public function create()
    {
        return view('estancias.create');
    }

    public function store(Request $request)
    {
        $estancia = new Estancia();
        $estancia->fill($request->all());
        $estancia->save();
        return redirect()->route('estancias.index');
    }

    public function show($id)
    {
        return view('estancias.show', compact('estancia'));
    }

    public function edit($id)
    {
        $estancia = Estancia::find($id);
        return view('estancias.edit', compact('estancia'));
    }

    public function update(Request $request, $id)
    {
        $estancia = Estancia::find($id);
        $estancia->fill($request->all());
        $estancia->save();
        return redirect()->route('estancias.index');
    }

    public function destroy($id)
    {
        $estancia = Estancia::find($id);
        $estancia->delete();
        return redirect()->route('estancias.index');
    }


}
