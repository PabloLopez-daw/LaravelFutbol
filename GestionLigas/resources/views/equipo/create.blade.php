@extends('app')

@section('content')
<div class="flex justify-center">
    <div class="card w-full max-w-2xl bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl text-primary mb-4">Nuevo Equipo</h2>
            
            <form action="{{ route('equipo.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Nombre del Equipo</span>
                    </label>
                    <input type="text" name="nombre" class="input input-bordered input-primary w-full" required />
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Ciudad</span>
                        </label>
                        <input type="text" name="ciudad" class="input input-bordered input-primary w-full" required />
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Presupuesto (€)</span>
                        </label>
                        <input type="number" name="presupuesto" class="input input-bordered input-primary w-full" required />
                    </div>
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Logo / Escudo</span>
                    </label>
                    <input type="file" name="foto" class="file-input file-input-bordered file-input-primary w-full" accept="image/*" />
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Liga</span>
                    </label>
                    <select name="id_liga" class="select select-bordered select-primary w-full">
                        @foreach($ligas as $liga)
                            <option value="{{ $liga->id }}">{{ $liga->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="card-actions justify-end mt-6">
                    <a href="{{ route('equipo.index') }}" class="btn btn-ghost">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Equipo</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection