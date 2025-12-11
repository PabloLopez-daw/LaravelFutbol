@extends('app')

@section('content')
<div class="flex justify-center">
    <div class="card w-full max-w-2xl bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl text-primary mb-4">Editar Equipo: {{ $equipo->nombre }}</h2>
            
            <form action="{{ route('equipo.update', $equipo->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Nombre</span>
                    </label>
                    <input type="text" name="nombre" value="{{ $equipo->nombre }}" class="input input-bordered input-primary w-full" required />
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Ciudad</span>
                        </label>
                        <input type="text" name="ciudad" value="{{ $equipo->ciudad }}" class="input input-bordered input-primary w-full" required />
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Presupuesto (€)</span>
                        </label>
                        <input type="number" name="presupuesto" value="{{ $equipo->presupuesto }}" class="input input-bordered input-primary w-full" required />
                    </div>
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Logo Actual</span>
                    </label>
                    <div class="flex items-center gap-4">
                        <div class="avatar">
                            <div class="w-16 rounded-xl">
                                @if($equipo->foto)
                                    <img src="{{ asset('storage/' . $equipo->foto) }}" />
                                @else
                                    <div class="bg-neutral-focus text-neutral-content w-16 h-16 flex items-center justify-center bg-gray-200">
                                        <span>Sin foto</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <input type="file" name="foto" class="file-input file-input-bordered file-input-primary w-full max-w-xs" accept="image/*" />
                    </div>
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Liga</span>
                    </label>
                    <select name="id_liga" class="select select-bordered select-primary w-full">
                        @foreach($ligas as $liga)
                            <option value="{{ $liga->id }}" {{ $equipo->id_liga == $liga->id ? 'selected' : '' }}>
                                {{ $liga->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
        
                <div class="card-actions justify-end mt-6">
                    <a href="{{ route('equipo.index') }}" class="btn btn-ghost">Cancelar</a>
                    <button type="submit" class="btn btn-warning">Actualizar Equipo</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection