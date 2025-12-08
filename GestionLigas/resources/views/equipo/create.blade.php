@extends('app')

@section('content')
<h2>Crear Nuevo Equipo</h2>
{{-- enctype es OBLIGATORIO para subir fotos --}}
<form action="{{ route('equipo.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Ciudad</label>
        <input type="text" name="ciudad" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Presupuesto</label>
        <input type="number" name="presupuesto" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
    </div>
    
    <div class="mb-3">
        <label>Liga</label>
        <select name="id_liga" class="form-control">
            @foreach($ligas as $liga)
                <option value="{{ $liga->id }}">{{ $liga->nombre }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Equipo</button>
</form>
@endsection