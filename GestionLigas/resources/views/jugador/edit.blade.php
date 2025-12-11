@extends('app')

@section('content')
<div class="flex justify-center">
    <div class="card w-full max-w-2xl bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl text-primary mb-4">Editar Jugador</h2>
            
            <form action="{{ route('jugador.update', $jugador->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Nombre</span>
                        </label>
                        <input type="text" name="nombre" value="{{ $jugador->nombre }}" class="input input-bordered input-primary w-full" required />
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Apellido</span>
                        </label>
                        <input type="text" name="apellido1" value="{{ $jugador->apellido1 }}" class="input input-bordered input-primary w-full" required />
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">DNI</span>
                        </label>
                        <input type="text" name="dni" value="{{ $jugador->dni }}" class="input input-bordered input-primary w-full" required />
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Edad</span>
                        </label>
                        <input type="number" name="edad" value="{{ $jugador->edad }}" class="input input-bordered input-primary w-full" required />
                    </div>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Foto</span>
                    </label>
                    <div class="flex items-center gap-4">
                        @if($jugador->foto)
                            <div class="avatar">
                                <div class="w-12 rounded-full">
                                    <img src="{{ asset('storage/' . $jugador->foto) }}" />
                                </div>
                            </div>
                        @else
                            <div class="avatar placeholder">
                                <div class="bg-neutral-focus text-neutral-content w-12 rounded-full">
                                    <span>{{ substr($jugador->nombre, 0, 1) }}</span>
                                </div>
                            </div>
                        @endif
                        <input type="file" name="foto" class="file-input file-input-bordered file-input-primary w-full" accept="image/*" />
                    </div>
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Equipo</span>
                    </label>
                    <select name="id_equipo" class="select select-bordered select-primary w-full">
                        @foreach($equipos as $equipo)
                            <option value="{{ $equipo->id }}" {{ $jugador->id_equipo == $equipo->id ? 'selected' : '' }}>
                                {{ $equipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="card-actions justify-end mt-6">
                    <a href="{{ route('jugador.index') }}" class="btn btn-ghost">Cancelar</a>
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection