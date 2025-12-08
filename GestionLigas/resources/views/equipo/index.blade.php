@extends('app')

@section('content')
<h2>Listado de Equipos</h2>
<a href="{{ route('equipo.create') }}" class="btn btn-success mb-3">Nuevo Equipo</a>

<table class="table">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Liga</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipos as $equipo)
        <tr>
            <td>
                @if($equipo->foto)
                    {{-- Asset entra a la carpeta public/storage --}}
                    <img src="{{ asset('storage/' . $equipo->foto) }}" width="50" style="border-radius: 5px">
                @else
                    <span>Sin foto</span>
                @endif
            </td>
            <td>{{ $equipo->nombre }}</td>
            <td>{{ $equipo->liga->nombre }}</td>
            <td>
                <a href="{{ route('equipo.show', $equipo->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('equipo.edit', $equipo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                
                {{-- BOTÓN DE ELIMINAR CON CONFIRMACIÓN --}}
                <form action="{{ route('equipo.destroy', $equipo->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    
                    {{-- El onclick crea la ventana de confirmación --}}
                    <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('¿Estás seguro de borrar el equipo {{ $equipo->nombre }}? Se borrarán todos sus jugadores.')">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection