@extends('app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="md:col-span-3">
        <div class="card bg-base-100 shadow-xl border-l-8 border-primary">
            <div class="card-body">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="card-title text-3xl mb-2">{{ $liga->nombre }}</h2>
                        <div class="flex gap-4">
                            <div class="badge badge-primary badge-lg">{{ $liga->categoria }}</div>
                            <div class="badge badge-outline badge-lg">{{ $liga->ciudad }}</div>
                        </div>
                    </div>
                    <a href="{{ route('liga.index') }}" class="btn btn-ghost">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card bg-base-100 shadow-xl">
    <div class="card-body">
        <h3 class="card-title text-xl text-primary mb-4">Equipos Participantes</h3>
        
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead class="bg-base-200">
                    <tr>
                        <th>Logo</th>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipos as $equipo)
                    <tr class="hover">
                        <td>
                            @if($equipo->foto)
                                <div class="avatar">
                                    <div class="w-16 h-16 rounded-xl border border-base-300 bg-white p-2">
                                        <img src="{{ asset('storage/' . $equipo->foto) }}" alt="Avatar" class="object-contain w-full h-full" />
                                    </div>
                                </div>
                            @else
                                <div class="avatar placeholder">
                                    <div class="bg-neutral-focus text-neutral-content rounded-xl w-16 h-16">
                                        <span class="text-xl">{{ substr($equipo->nombre, 0, 1) }}</span>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td class="font-bold">{{ $equipo->nombre }}</td>
                        <td>
                            <a href="{{ route('equipo.show', $equipo->id) }}" class="btn btn-sm btn-secondary text-white">
                                Ver Plantilla
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection