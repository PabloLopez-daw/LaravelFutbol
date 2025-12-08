@extends('app')
@section('content')
<h1>{{ $liga->nombre }}</h1>
<p>Categoría: {{ $liga->categoria }} | Ciudad: {{ $liga->ciudad }}</p>

<h3>Equipos Participantes</h3>
<table class="table">
    <thead><tr><th>Logo</th><th>Nombre</th><th>Acción</th></tr></thead>
    <tbody>
        @foreach($equipos as $equipo)
        <tr>
            <td>
                @if($equipo->foto)
                     <img src="{{ asset('storage/' . $equipo->foto) }}" width="40">
                @endif
            </td>
            <td>{{ $equipo->nombre }}</td>
            <td><a href="{{ route('equipo.show', $equipo->id) }}" class="btn btn-sm btn-info">Ver Plantilla</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('liga.index') }}" class="btn btn-secondary">Volver</a>
@endsection