@extends('app')
@section('content')
<h2>Nueva Liga</h2>
<form action="{{ route('liga.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nombre:</label> <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Ciudad:</label> <input type="text" name="ciudad" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Categoría:</label> <input type="text" name="categoria" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection