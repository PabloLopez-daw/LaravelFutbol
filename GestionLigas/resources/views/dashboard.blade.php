<x-app-layout>
    <div class="hero min-h-[40vh] bg-base-200 rounded-box">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold text-primary">¡Hola, {{ Auth::user()->name }}!</h1>
                <p class="py-6">Bienvenido de nuevo al panel de gestión deportiva oficial de la RFAF.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('liga.index') }}" class="btn btn-primary">Gestionar Ligas</a>
                    <a href="{{ route('equipo.index') }}" class="btn btn-secondary text-white">Gestionar Equipos</a>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-figure text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="stat-title">Total Ligas</div>
                <div class="stat-value text-primary">{{ \App\Models\Liga::count() }}</div>
                <div class="stat-desc">Competiciones activas</div>
            </div>
        </div>
        
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                </div>
                <div class="stat-title">Equipos</div>
                <div class="stat-value text-secondary">{{ \App\Models\Equipo::count() }}</div>
                <div class="stat-desc">Clubes registrados</div>
            </div>
        </div>
        
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-figure text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <div class="stat-title">Jugadores</div>
                <div class="stat-value text-accent">{{ \App\Models\Jugador::count() }}</div>
                <div class="stat-desc">Fichas federativas</div>
            </div>
        </div>
    </div>
</x-app-layout>
