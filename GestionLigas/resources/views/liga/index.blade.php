@extends('app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-primary">Ligas de Fútbol</h1>
    <a href="{{ route('liga.create') }}" class="btn btn-primary gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
        Nueva Liga
    </a>
</div>

<div class="overflow-x-auto shadow-xl rounded-lg bg-base-100">
    <table class="table table-zebra w-full">
        <!-- head -->
        <thead class="bg-primary text-primary-content">
            <tr>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ligas as $liga)
            <tr class="hover">
                <td class="font-bold text-lg">{{ $liga->nombre }}</td>
                <td>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="h-4 w-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        {{ $liga->ciudad }}
                    </div>
                </td>
                <td class="py-4">
                    <div class="flex gap-2 items-center">
                        <div class="tooltip" data-tip="Ver Equipos">
                            <a href="{{ route('liga.show', $liga->id) }}" class="btn btn-square btn-sm btn-ghost text-secondary hover:bg-secondary/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                            </a>
                        </div>
                        
                        <div class="tooltip" data-tip="Editar Liga">
                            <a href="{{ route('liga.edit', $liga->id) }}" class="btn btn-square btn-sm btn-ghost text-info hover:bg-info/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00 2 2h11a2 2 0 00 2-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            </a>
                        </div>
                        
                        <form action="{{ route('liga.destroy', $liga->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <div class="tooltip" data-tip="Eliminar">
                                <button type="submit" class="btn btn-square btn-sm btn-ghost text-error hover:bg-error/10" 
                                    onclick="return confirm('¿Seguro? Borrar esta liga ELIMINARÁ todos sus equipos y jugadores.')">
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