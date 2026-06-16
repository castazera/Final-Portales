<x-layout>
    <x-slot:title>Mi Perfil</x-slot:title>
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <div class="perfil-container">
        <h1 class="perfil-titulo">Mi Perfil</h1>
        <div class="perfil-card">
            <div class="perfil-campo">
                <span class="perfil-label">Nombre</span>
                <span class="perfil-valor">{{ $user->name }}</span>
            </div>
            <div class="perfil-campo">
                <span class="perfil-label">Email</span>
                <span class="perfil-valor">{{ $user->email }}</span>
            </div>
            <div class="perfil-campo">
                <span class="perfil-label">Teléfono</span>
                <span class="perfil-valor">{{ $user->telefono ?? 'No registrado' }}</span>
            </div>
            <div class="perfil-campo">
                <span class="perfil-label">Dirección</span>
                <span class="perfil-valor">{{ $user->direccion ?? 'No registrada' }}</span>
            </div>
            <div class="perfil-campo">
                <span class="perfil-label">Miembro desde</span>
                <span class="perfil-valor">{{ $user->created_at ? $user->created_at->format('d/m/Y') : '-' }}</span>
            </div>
            <div class="perfil-acciones">
                <a href="{{ route('perfil.edit') }}" class="boton-perfil">Editar perfil</a>
            </div>
        </div>
    </div>
</x-layout>
