@extends('app')

@section('content')
<div class="card lg:card-side bg-base-100 shadow-xl mb-8 border border-base-200">
    <figure class="lg:w-1/3 bg-base-200 p-8 flex items-center justify-center">
        @if($equipo->foto)
            <div class="avatar">
                <div class="w-48 h-48 rounded-xl bg-white p-4 shadow-lg ring-1 ring-base-300">
                    <img src="{{ asset('storage/' . $equipo->foto) }}" alt="Logo" class="object-contain w-full h-full" />
                </div>
            </div>
        @else
            <div class="w-48 h-48 flex items-center justify-center bg-base-100 rounded-xl shadow-inner">
                <span class="text-4xl text-gray-300 font-bold">Sin Foto</span>
            </div>
        @endif
    </figure>
    <div class="card-body">
        <h2 class="card-title text-4xl mb-4">{{ $equipo->nombre }}</h2>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <p class="font-bold text-gray-500 uppercase text-xs">Ciudad</p>
                <p class="text-xl">{{ $equipo->ciudad }}</p>
            </div>
            <div>
                <p class="font-bold text-gray-500 uppercase text-xs">Liga</p>
                <div class="badge badge-primary badge-lg mt-1">{{ $equipo->liga->nombre }}</div>
            </div>
            <div>
                <p class="font-bold text-gray-500 uppercase text-xs">Presupuesto</p>
                <p class="text-xl text-secondary font-mono">{{ number_format($equipo->presupuesto, 2) }} €</p>
            </div>
        </div>
        <div class="card-actions justify-end mt-auto">
            <a href="{{ route('equipo.edit', $equipo->id) }}" class="btn btn-warning">Editar Datos</a>
            <a href="{{ route('equipo.index') }}" class="btn btn-ghost">Volver</a>
        </div>
    </div>
</div>

<div class="card bg-base-100 shadow-xl">
    <div class="card-body">
        <div class="flex justify-between items-center mb-4">
            <h3 class="card-title text-2xl text-accent">Plantilla</h3>
            <a href="{{ route('jugador.create') }}" class="btn btn-sm btn-accent text-white">Fichar Jugador</a>
        </div>
        
        @if($jugadores->isEmpty())
            <div class="alert alert-warning shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                <span>Este equipo aún no tiene jugadores.</span>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead class="bg-base-200">
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Goles</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jugadores as $jugador)
                        <tr class="hover">
                            <td>
                                @if($jugador->foto)
                                    <div class="avatar">
                                        <div class="w-12 h-12 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2 overflow-hidden">
                                            <img src="{{ asset('storage/' . $jugador->foto) }}" class="object-cover object-center w-full h-full" />
                                        </div>
                                    </div>
                                @else
                                    <div class="avatar placeholder">
                                        <div class="bg-neutral-focus text-neutral-content rounded-full w-12 h-12">
                                            <span>{{ substr($jugador->nombre, 0, 1) }}</span>
                                        </div>
                                    </div>
                                @endif
                            </td>
                            <td class="font-bold">{{ $jugador->nombre }} {{ $jugador->apellido1 }}</td>
                            <td>{{ $jugador->dni }}</td>
                            <td>
                                <div class="badge badge-accent text-white">{{ $jugador->goles }}</div>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <div class="tooltip" data-tip="Editar">
                                        <a href="{{ route('jugador.edit', $jugador->id) }}" class="btn btn-square btn-xs btn-info text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                        </a>
                                    </div>
                                    <form action="{{ route('jugador.destroy', $jugador->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <div class="tooltip" data-tip="Expulsar">
                                            <button type="submit" class="btn btn-square btn-xs btn-error text-white" 
                                                    onclick="return confirm('¿Despedir a {{ $jugador->nombre }}?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
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
        @endif
    </div>
</div>
@endsection