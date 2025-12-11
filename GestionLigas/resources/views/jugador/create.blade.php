@extends('app')

@section('content')
<div class="flex justify-center">
    <div class="card w-full max-w-2xl bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl text-primary mb-4">Fichar Nuevo Jugador</h2>
            
            <form action="{{ route('jugador.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Nombre</span>
                        </label>
                        <input type="text" name="nombre" class="input input-bordered input-primary w-full" required />
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Primer Apellido</span>
                        </label>
                        <input type="text" name="apellido1" class="input input-bordered input-primary w-full" required />
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">DNI</span>
                        </label>
                        <input type="text" name="dni" class="input input-bordered input-primary w-full" required />
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Edad</span>
                        </label>
                        <input type="number" name="edad" class="input input-bordered input-primary w-full" required />
                    </div>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Foto</span>
                    </label>
                    <input type="file" name="foto" class="file-input file-input-bordered file-input-primary w-full" accept="image/*" />
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Equipo</span>
                    </label>
                    <select name="id_equipo" class="select select-bordered select-primary w-full">
                        @foreach($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="card-actions justify-end mt-6">
                    <a href="{{ route('jugador.index') }}" class="btn btn-ghost">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Fichar Jugador</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection