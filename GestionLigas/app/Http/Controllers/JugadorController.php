<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // IMPORTANTE PARA FOTOS
use Illuminate\View\View;

class JugadorController extends Controller
{
    // Listado de todos los jugadores
    public function index(): View {
        $jugadores = Jugador::all();
        return view('jugador.index', ['jugadores' => $jugadores]);
    }

    // VISTA CREAR (Necesitamos los equipos para el desplegable)
    public function create(): View {
        $equipos = Equipo::all();
        return view('jugador.create', ['equipos' => $equipos]);
    }

    // GUARDAR (Store)
    public function store(Request $request) {
        $input = $request->all();

        // 1. Subida de la foto
        if($request->hasFile('foto')){
            // Se guarda en storage/app/public/jugadores
            $input['foto'] = $request->file('foto')->store('jugadores', 'public');
        }

        $jugador = new Jugador($input);

        try {
            $jugador->save();
            $mensaje = 'Jugador fichado correctamente.';
        } catch(\Exception $e) {
            return back()->withErrors(['mensajeTexto' => 'Error al guardar el jugador.']);
        }

        // Redirigimos al equipo para ver que el jugador está allí
        return redirect()->route('equipo.show', $jugador->id_equipo)->with(['mensajeTexto' => $mensaje]);
    }

    // VISTA EDITAR
    public function edit(Jugador $jugador): View {
        $equipos = Equipo::all();
        return view('jugador.edit', ['jugador' => $jugador, 'equipos' => $equipos]);
    }

    // ACTUALIZAR (Update)
    public function update(Request $request, Jugador $jugador) {
        $input = $request->all();

        // 2. Gestión de foto al editar
        if($request->hasFile('foto')){
            // Borramos la foto vieja si existe
            if($jugador->foto) {
                Storage::disk('public')->delete($jugador->foto);
            }
            // Guardamos la nueva
            $input['foto'] = $request->file('foto')->store('jugadores', 'public');
        }

        $jugador->fill($input);

        try {
            $jugador->save();
            $mensaje = 'Datos del jugador actualizados.';
        } catch(\Exception $e) {
            return back()->withErrors(['mensajeTexto' => 'Error al actualizar.']);
        }

        return redirect()->route('equipo.show', $jugador->id_equipo)->with(['mensajeTexto' => $mensaje]);
    }

    // ELIMINAR (Destroy)
    public function destroy(Jugador $jugador) {
        $idEquipo = $jugador->id_equipo; // Guardamos id para volver luego
        try {
            // Borramos foto del disco
            if($jugador->foto) {
                Storage::disk('public')->delete($jugador->foto);
            }
            $jugador->delete();
            $mensaje = 'Jugador eliminado.';
        } catch(\Exception $e) {
            return back()->withErrors(['mensajeTexto' => 'Error al eliminar.']);
        }

        return redirect()->route('equipo.show', $idEquipo)->with(['mensajeTexto' => $mensaje]);
    }
}