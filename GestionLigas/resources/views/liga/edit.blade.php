@extends('app')
@section('content')
<h2>Editar Liga</h2>
<form action="{{ route('liga.update', $liga->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label>Nombre:</label> 
        <input type="text" name="nombre" value="{{ $liga->nombre }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Ciudad:</label> 
        <input type="text" name="ciudad" value="{{ $liga->ciudad }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Categoría:</label> 
        <input type="text" name="categoria" value="{{ $liga->categoria }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-warning">Actualizar</button>
</form>
@endsection