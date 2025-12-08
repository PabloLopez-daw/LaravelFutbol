@extends('app')
@section('content')
<h2>Editar Jugador</h2>
<form action="{{ route('jugador.update', $jugador->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre:</label> 
        <input type="text" name="nombre" value="{{ $jugador->nombre }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Apellido:</label> 
        <input type="text" name="apellido1" value="{{ $jugador->apellido1 }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>DNI:</label> 
        <input type="text" name="dni" value="{{ $jugador->dni }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Edad:</label> 
        <input type="number" name="edad" value="{{ $jugador->edad }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Foto Actual:</label><br>
        @if($jugador->foto)
            <img src="{{ asset('storage/' . $jugador->foto) }}" width="80">
        @else
            <span>Sin foto</span>
        @endif
        <br>
        <label>Cambiar Foto:</label> 
        <input type="file" name="foto" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
        <label>Equipo:</label>
        <select name="id_equipo" class="form-control">
            @foreach($equipos as $equipo)
                <option value="{{ $equipo->id }}" {{ $jugador->id_equipo == $equipo->id ? 'selected' : '' }}>
                    {{ $equipo->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-warning">Actualizar</button>
</form>
@endsection