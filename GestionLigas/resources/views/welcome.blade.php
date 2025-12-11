<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="rfaf">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RFAF Gestión de Ligas</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-base-200 min-h-screen">
        
        <!-- Navbar -->
        <div class="navbar bg-base-100 shadow-md">
            <div class="flex-1">
                <a class="btn btn-ghost normal-case text-xl text-primary font-bold">RFAF GESTIÓN</a>
            </div>
            <div class="flex-none gap-2">
                @if (Route::has('login'))
                    <div class="flex gap-2">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>

        <!-- Hero Section -->
        <div class="hero min-h-[60vh] bg-base-200">
            <div class="hero-content text-center">
                <div class="max-w-xl">
                    <h1 class="text-5xl font-bold text-primary">Gestión de Fútbol</h1>
                    <p class="py-6 text-lg">Plataforma oficial para la administración profesional de ligas, equipos y jugadores de la Federación.</p>
                    <div class="flex justify-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Ir al Panel</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                            <a href="{{ route('register') }}" class="btn btn-outline btn-primary">Registrarse</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature Cards -->
        <div class="container mx-auto px-4 pb-20">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="card bg-base-100 shadow-xl hover:-translate-y-1 transition-transform cursor-pointer border-t-4 border-primary">
                    <div class="card-body items-center text-center">
                        <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-2">
                            <span class="text-3xl font-bold text-primary">L</span>
                        </div>
                        <h2 class="card-title text-primary">Ligas</h2>
                        <p>Gestión completa de calendarios y clasificaciones.</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="card bg-base-100 shadow-xl hover:-translate-y-1 transition-transform cursor-pointer border-t-4 border-accent">
                    <div class="card-body items-center text-center">
                        <div class="w-16 h-16 rounded-full bg-accent/10 flex items-center justify-center mb-2">
                            <span class="text-3xl font-bold text-accent">E</span>
                        </div>
                        <h2 class="card-title text-accent">Equipos</h2>
                        <p>Administración de clubes y fichas técnicas.</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="card bg-base-100 shadow-xl hover:-translate-y-1 transition-transform cursor-pointer border-t-4 border-secondary">
                    <div class="card-body items-center text-center">
                        <div class="w-16 h-16 rounded-full bg-secondary/10 flex items-center justify-center mb-2">
                            <span class="text-3xl font-bold text-secondary">J</span>
                        </div>
                        <h2 class="card-title text-secondary">Jugadores</h2>
                        <p>Base de datos de futbolistas federados.</p>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-center p-10 bg-primary text-primary-content">
            <div>
                <p class="font-bold">
                    Real Federación Andaluza de Fútbol <br/>
                    Sistema de Gestión Integral 2025
                </p> 
                <p>Copyright © {{ date('Y') }} - All right reserved</p>
            </div>
        </footer>
    </body>
</html>
