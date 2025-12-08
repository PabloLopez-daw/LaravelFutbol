@extends('app')

@section('content')
<div class="container">
    {{-- TARJETA DEL EQUIPO --}}
    <div class="card mb-4 shadow-sm">
        <div class="row g-0">
            <div class="col-md-4">
                @if($equipo->foto)
                    <img src="{{ asset('storage/' . $equipo->foto) }}" class="img-fluid rounded-start" alt="Foto Equipo" style="width: 100%; height: 250px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-light text-muted" style="height: 250px;">
                        Sin Foto
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title">{{ $equipo->nombre }}</h1>
                    <p class="card-text">
                        <strong>Ciudad:</strong> {{ $equipo->ciudad }}<br>
                        <strong>Presupuesto:</strong> {{ number_format($equipo->presupuesto, 2) }} €<br>
                        <strong>Liga:</strong> 
                        <a href="{{ route('liga.show', $equipo->id_liga) }}" class="text-decoration-none">
                            {{ $equipo->liga->nombre }}
                        </a>
                    </p>
                    <div class="mt-3">
                        <a href="{{ route('equipo.edit', $equipo->id) }}" class="btn btn-warning">Editar Equipo</a>
                        <a href="{{ route('equipo.index') }}" class="btn btn-secondary">Volver al Listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- LISTA DE JUGADORES DEL EQUIPO --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Plantilla de Jugadores</h3>
        <a href="{{ route('jugador.create') }}" class="btn btn-success">Fichar Jugador</a>
    </div>

    @if($jugadores->isEmpty())
        <div class="alert alert-info">
            Este equipo aún no tiene jugadores registrados.
        </div>
    @else
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Edad</th>
                    <th>Goles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jugadores as $jugador)
                <tr>
                    <td>
                        @if($jugador->foto)
                            <img src="{{ asset('storage/' . $jugador->foto) }}" width="50" height="50" class="rounded-circle" style="object-fit: cover;">
                        @else
                            <span class="badge bg-secondary">N/A</span>
                        @endif
                    </td>
                    <td>{{ $jugador->nombre }} {{ $jugador->apellido1 }}</td>
                    <td>{{ $jugador->dni }}</td>
                    <td>{{ $jugador->edad }}</td>
                    <td>{{ $jugador->goles }}</td>
                    <td>
                        <a href="{{ route('jugador.edit', $jugador->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        
                        {{-- Botón de Borrar Jugador --}}
                        <form action="{{ route('jugador.destroy', $jugador->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('¿Estás seguro de despedir al jugador {{ $jugador->nombre }}?')">
                                X
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection