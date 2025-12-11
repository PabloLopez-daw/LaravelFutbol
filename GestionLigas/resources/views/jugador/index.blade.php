@extends('app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-primary">Jugadores</h1>
    <a href="{{ route('jugador.create') }}" class="btn btn-primary gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
        Fichar Jugador
    </a>
</div>

<div class="overflow-x-auto shadow-xl rounded-lg bg-base-100">
    <table class="table table-zebra w-full">
        <thead class="bg-primary text-primary-content">
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Equipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jugadores as $jugador)
            <tr class="hover">
                <td>
                    @if($jugador->foto)
                        <div class="avatar">
                            <div class="w-16 h-16 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2 overflow-hidden">
                                <img src="{{ asset('storage/' . $jugador->foto) }}" alt="Avatar" class="w-full h-full object-cover object-center" />
                            </div>
                        </div>
                    @else
                        <div class="avatar placeholder">
                            <div class="bg-neutral-focus text-neutral-content rounded-full w-16 h-16 ring ring-primary ring-offset-base-100 ring-offset-2">
                                <span class="text-xl">{{ substr($jugador->nombre, 0, 1) }}</span>
                            </div>
                        </div>
                    @endif
                </td>
                <td class="font-bold">
                    <div class="flex flex-col">
                        <span class="text-lg">{{ $jugador->nombre }} {{ $jugador->apellido1 }}</span>
                        <span class="text-xs text-gray-400 font-normal">DNI: {{ $jugador->dni }}</span>
                    </div>
                </td>
                <td>
                    <div class="font-mono text-sm">{{ $jugador->dni }}</div>
                </td>
                <td>
                    @if($jugador->equipo)
                        <span class="badge badge-accent badge-outline font-bold">
                            {{ $jugador->equipo->nombre }}
                        </span>
                    @else
                        <span class="badge badge-ghost">Agente Libre</span>
                    @endif
                </td>
                <td class="py-4">
                    <div class="flex gap-2 items-center">
                        <div class="tooltip" data-tip="Editar Jugador">
                            <a href="{{ route('jugador.edit', $jugador->id) }}" class="btn btn-square btn-sm btn-ghost text-info hover:bg-info/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00 2 2h11a2 2 0 00 2-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            </a>
                        </div>
                        
                        <form action="{{ route('jugador.destroy', $jugador->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <div class="tooltip" data-tip="Expulsar">
                                <button type="submit" class="btn btn-square btn-sm btn-ghost text-error hover:bg-error/10" 
                                    onclick="return confirm('¿Eliminar al jugador?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6" /></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection