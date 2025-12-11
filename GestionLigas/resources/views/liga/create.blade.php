@extends('app')

@section('content')
<div class="flex justify-center">
    <div class="card w-full max-w-lg bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl text-primary mb-4">Nueva Liga</h2>
            
            <form action="{{ route('liga.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Nombre</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Ej: Primera División" class="input input-bordered input-primary w-full" required />
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Ciudad</span>
                    </label>
                    <input type="text" name="ciudad" placeholder="Ej: Madrid" class="input input-bordered input-primary w-full" required />
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Categoría</span>
                    </label>
                    <input type="text" name="categoria" placeholder="Ej: Profesional" class="input input-bordered input-primary w-full" required />
                </div>
                
                <div class="card-actions justify-end mt-6">
                    <a href="{{ route('liga.index') }}" class="btn btn-ghost">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Liga</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection