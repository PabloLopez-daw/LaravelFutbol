@extends('app')
@section('content')
<h2>Fichar Nuevo Jugador</h2>
<form action="{{ route('jugador.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Nombre:</label> <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Primer Apellido:</label> <input type="text" name="apellido1" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>DNI:</label> <input type="text" name="dni" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Edad:</label> <input type="number" name="edad" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Foto:</label> 
        <input type="file" name="foto" class="form-control" accept="image/*">
    </div>
    <div class="mb-3">
        <label>Equipo:</label>
        <select name="id_equipo" class="form-control">
            @foreach($equipos as $equipo)
                <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection