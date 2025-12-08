<?php

namespace App\Http\Controllers;

use App\Models\Liga;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LigaController extends Controller
{
    public function index(): View {
        return view('liga.index', ['ligas' => Liga::all()]);
    }

    public function create(): View {
        return view('liga.create');
    }

    public function store(Request $request) {
        $liga = new Liga($request->all());
        try {
            $liga->save();
            return redirect()->route('liga.index')->with(['mensajeTexto' => 'Liga creada.']);
        } catch(\Exception $e) {
            return back()->withErrors(['mensajeTexto' => 'Error al crear la liga.']);
        }
    }

    public function edit(Liga $liga): View {
        return view('liga.edit', ['liga' => $liga]);
    }

    public function update(Request $request, Liga $liga) {
        $liga->fill($request->all());
        try {
            $liga->save();
            return redirect()->route('liga.index')->with(['mensajeTexto' => 'Liga actualizada.']);
        } catch(\Exception $e) {
            return back()->withErrors(['mensajeTexto' => 'Error al editar.']);
        }
    }

    public function destroy(Liga $liga) {
        try {
            // Al borrar la liga, la cascada de la BD borrará equipos y jugadores
            $liga->delete();
            return redirect()->route('liga.index')->with(['mensajeTexto' => 'Liga eliminada con todos sus equipos.']);
        } catch(\Exception $e) {
            return back()->withErrors(['mensajeTexto' => 'Error al eliminar.']);
        }
    }

    public function show(Liga $liga): View {
        return view('liga.show', ['liga' => $liga, 'equipos' => $liga->equipos]);
    }
}