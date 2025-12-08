@extends('app')

@section('content')
<h2>Listado de Jugadores</h2>
<a href="{{ route('jugador.create') }}" class="btn btn-success mb-3">Fichar Nuevo Jugador</a>

<table class="table align-middle">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nombre Completo</th>
            <th>DNI</th>
            <th>Equipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jugadores as $jugador)
        <tr>
            <td>
                @if($jugador->foto)
                    <img src="{{ asset('storage/' . $jugador->foto) }}" width="50" style="border-radius: 5px">
                @else
                    <span class="text-muted">Sin foto</span>
                @endif
            </td>
            <td>{{ $jugador->nombre }} {{ $jugador->apellido1 }}</td>
            <td>{{ $jugador->dni }}</td>
            <td>
                {{-- Usamos ?? 'Sin equipo' por si acaso borraste el equipo pero no el jugador --}}
                {{ $jugador->equipo->nombre ?? 'Sin Equipo' }}
            </td>
            <td>
                <a href="{{ route('jugador.edit', $jugador->id) }}" class="btn btn-warning btn-sm">Editar</a>
                
                {{-- BOTÓN ELIMINAR CON CONFIRMACIÓN --}}
                <form action="{{ route('jugador.destroy', $jugador->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('¿Eliminar al jugador {{ $jugador->nombre }}?')">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection