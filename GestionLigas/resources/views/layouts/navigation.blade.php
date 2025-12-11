<div class="navbar bg-base-100 shadow-lg sticky top-0 z-50">
    <!-- Navbar Start -->
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
                <li><a href="{{ route('liga.index') }}" class="{{ request()->routeIs('liga.*') ? 'active' : '' }}">Ligas</a></li>
                <li><a href="{{ route('equipo.index') }}" class="{{ request()->routeIs('equipo.*') ? 'active' : '' }}">Equipos</a></li>
                <li><a href="{{ route('jugador.index') }}" class="{{ request()->routeIs('jugador.*') ? 'active' : '' }}">Jugadores</a></li>
            </ul>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-ghost normal-case text-xl text-primary font-bold">RFAF GESTIÓN</a>
    </div>

    <!-- Navbar Center (LG only) -->
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 font-medium">
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('liga.index') }}" class="{{ request()->routeIs('liga.*') ? 'active' : '' }}">Ligas</a></li>
            <li><a href="{{ route('equipo.index') }}" class="{{ request()->routeIs('equipo.*') ? 'active' : '' }}">Equipos</a></li>
            <li><a href="{{ route('jugador.index') }}" class="{{ request()->routeIs('jugador.*') ? 'active' : '' }}">Jugadores</a></li>
        </ul>
    </div>

    <!-- Navbar End -->
    <div class="navbar-end">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar placeholder">
                <div class="bg-neutral text-neutral-content rounded-full w-10">
                    <span class="text-xl">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('profile.edit') }}" class="justify-between">Profile</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
