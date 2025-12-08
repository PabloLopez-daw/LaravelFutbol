<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Liga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Necesario para borrar fotos
use Illuminate\View\View;

class EquipoController extends Controller
{
    public function index(): View {
        return view('equipo.index', ['equipos' => Equipo::all()]);
    }

    // Vista CREAR (separada)
    public function create(): View {
        $ligas = Liga::all();
        return view('equipo.create', ['ligas' => $ligas]);
    }

    public function store(Request $request) {
        $input = $request->all();
        
        // Subida de FOTO
        if($request->hasFile('foto')){
            // Guarda en storage/app/public/equipos
            $input['foto'] = $request->file('foto')->store('equipos', 'public');
        }

        $equipo = new Equipo($input);
        
        try {
            $equipo->save();
            $mensaje = 'Equipo creado correctamente.';
        } catch(\Exception $e) {
            return back()->withErrors(['mensajeTexto' => 'Error al crear equipo.']);
        }

        return redirect()->route('equipo.index')->with(['mensajeTexto' => $mensaje]);
    }

    // Vista EDITAR (separada)
    public function edit(Equipo $equipo): View {
        $ligas = Liga::all();
        return view('equipo.edit', ['equipo' => $equipo, 'ligas' => $ligas]);
    }

    public function update(Request $request, Equipo $equipo) {
        $input = $request->all();

        // Si suben nueva foto, borramos la vieja y guardamos la nueva
        if($request->hasFile('foto')){
            if($equipo->foto) {
                Storage::disk('public')->delete($equipo->foto);
            }
            $input['foto'] = $request->file('foto')->store('equipos', 'public');
        }

        $equipo->fill($input);

        try {
            $equipo->save();
            $mensaje = 'Equipo actualizado.';
        } catch(\Exception $e) {
            return back()->withErrors(['mensajeTexto' => 'Error al actualizar.']);
        }

        return redirect()->route('equipo.index')->with(['mensajeTexto' => $mensaje]);
    }

    public function destroy(Equipo $equipo) {
        try {
            // Borrar foto del disco si existe
            if($equipo->foto) {
                Storage::disk('public')->delete($equipo->foto);
            }
            $equipo->delete(); // Borra equipo y jugadores (cascade)
            $mensaje = 'Equipo eliminado.';
        } catch(\Exception $e) {
            return back()->withErrors(['mensajeTexto' => 'Error al eliminar.']);
        }
        
        return redirect()->route('equipo.index')->with(['mensajeTexto' => $mensaje]);
    }

    public function show(Equipo $equipo) {
        return view('equipo.show', ['equipo' => $equipo, 'jugadores' => $equipo->jugadores]);
    }
}