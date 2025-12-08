@extends('app')

@section('content')
<h2>Editar Equipo: {{ $equipo->nombre }}</h2>

<form action="{{ route('equipo.update', $equipo->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- Método PUT para editar --}}
    
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $equipo->nombre }}" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Ciudad</label>
        <input type="text" name="ciudad" value="{{ $equipo->ciudad }}" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Presupuesto</label>
        <input type="number" name="presupuesto" value="{{ $equipo->presupuesto }}" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Foto Actual</label><br>
        @if($equipo->foto)
            <img src="{{ asset('storage/' . $equipo->foto) }}" width="100">
        @else
            <p>Sin foto</p>
        @endif
        <br>
        <label>Cambiar Foto</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
    </div>
    
    <div class="mb-3">
        <label>Liga</label>
        <select name="id_liga" class="form-control">
            @foreach($ligas as $liga)
                <option value="{{ $liga->id }}" {{ $equipo->id_liga == $liga->id ? 'selected' : '' }}>
                    {{ $liga->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-warning">Actualizar Equipo</button>
</form>
@endsection