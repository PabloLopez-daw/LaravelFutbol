@extends('app')

@section('content')
<div class="flex justify-center">
    <div class="card w-full max-w-lg bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl text-primary mb-4">Editar Liga</h2>
            
            <form action="{{ route('liga.update', $liga->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Nombre</span>
                    </label>
                    <input type="text" name="nombre" value="{{ $liga->nombre }}" class="input input-bordered input-primary w-full" required />
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Ciudad</span>
                    </label>
                    <input type="text" name="ciudad" value="{{ $liga->ciudad }}" class="input input-bordered input-primary w-full" required />
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Categoría</span>
                    </label>
                    <input type="text" name="categoria" value="{{ $liga->categoria }}" class="input input-bordered input-primary w-full" required />
                </div>
                
                <div class="card-actions justify-end mt-6">
                    <a href="{{ route('liga.index') }}" class="btn btn-ghost">Cancelar</a>
                    <button type="submit" class="btn btn-warning">Actualizar Liga</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection