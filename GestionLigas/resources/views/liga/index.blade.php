@extends('app')
@section('content')
<h2>Ligas de Fútbol</h2>
<a href="{{ route('liga.create') }}" class="btn btn-primary mb-3">Nueva Liga</a>

<ul class="list-group">
    @foreach($ligas as $liga)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
            <strong>{{ $liga->nombre }}</strong> ({{ $liga->ciudad }})
        </div>
        <div>
            <a href="{{ route('liga.show', $liga->id) }}" class="btn btn-info btn-sm">Ver Equipos</a>
            <a href="{{ route('liga.edit', $liga->id) }}" class="btn btn-warning btn-sm">Editar</a>
            
            {{-- FORMULARIO DE BORRADO CON POPUP --}}
            <form action="{{ route('liga.destroy', $liga->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" 
                    onclick="return confirm('¿Seguro? Borrar esta liga ELIMINARÁ todos sus equipos y jugadores.')">
                    X
                </button>
            </form>
        </div>
    </li>
    @endforeach
</ul>
@endsection