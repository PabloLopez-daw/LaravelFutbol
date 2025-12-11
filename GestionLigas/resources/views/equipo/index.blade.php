@extends('app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-primary">Equipos</h1>
    <a href="{{ route('equipo.create') }}" class="btn btn-primary gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
        Nuevo Equipo
    </a>
</div>

<div class="overflow-x-auto shadow-xl rounded-lg bg-base-100">
    <table class="table table-zebra w-full">
        <thead class="bg-primary text-primary-content">
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Liga</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $equipo)
            <tr class="hover">
                <td>
                    @if($equipo->foto)
                        <div class="avatar">
                            <div class="w-20 h-20 rounded-xl border border-base-300 bg-white p-2 overflow-hidden">
                                <img src="{{ asset('storage/' . $equipo->foto) }}" alt="Logo" class="w-full h-full object-contain object-center" />
                            </div>
                        </div>
                    @else
                        <div class="avatar placeholder">
                            <div class="bg-neutral-focus text-neutral-content rounded-xl w-20 h-20">
                                <span class="text-3xl">{{ substr($equipo->nombre, 0, 1) }}</span>
                            </div>
                        </div>
                    @endif
                </td>
                <td class="font-bold text-lg">{{ $equipo->nombre }}</td>
                <td>
                    @if($equipo->liga)
                        <span class="badge badge-primary badge-outline gap-2">
                            {{ $equipo->liga->nombre }}
                        </span>
                    @else
                        <span class="badge badge-ghost">Sin Liga</span>
                    @endif
                </td>
                <td class="py-4">
                    <div class="flex gap-2 items-center">
                        <div class="tooltip" data-tip="Ver Detalles">
                            <a href="{{ route('equipo.show', $equipo->id) }}" class="btn btn-square btn-sm btn-ghost text-secondary hover:bg-secondary/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            </a>
                        </div>
                        
                        <div class="tooltip" data-tip="Editar Equipo">
                            <a href="{{ route('equipo.edit', $equipo->id) }}" class="btn btn-square btn-sm btn-ghost text-info hover:bg-info/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00 2 2h11a2 2 0 00 2-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            </a>
                        </div>
                        
                        <form action="{{ route('equipo.destroy', $equipo->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <div class="tooltip" data-tip="Eliminar">
                                <button type="submit" class="btn btn-square btn-sm btn-ghost text-error hover:bg-error/10" 
                                    onclick="return confirm('¿Estás seguro de borrar este equipo?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
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