<x-layout>
    <x-slot:title>Editar Perfil</x-slot:title>
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <div class="perfil-container">
        <h1 class="perfil-titulo">Editar Perfil</h1>
        @if ($errors->any())
            <div class="alerta-login-error">
                Por favor corrige los errores del formulario.
            </div>
        @endif
        <div class="perfil-card">
            <form action="{{ route('perfil.update') }}" method="POST" class="perfil-form">
                @csrf
                @method('PUT')

                <div class="perfil-form-grupo">
                    <label for="name" class="perfil-label">Nombre</label>
                    <input type="text" name="name" id="name" class="perfil-input @error('name') campo-error @enderror" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <span class="perfil-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="perfil-form-grupo">
                    <label for="email" class="perfil-label">Email</label>
                    <input type="email" name="email" id="email" class="perfil-input @error('email') campo-error @enderror" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <span class="perfil-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="perfil-form-grupo">
                    <label for="telefono" class="perfil-label">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="perfil-input @error('telefono') campo-error @enderror" value="{{ old('telefono', $user->telefono) }}" placeholder="Ej: +54 11 1234-5678">
                    @error('telefono')
                        <span class="perfil-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="perfil-form-grupo">
                    <label for="direccion" class="perfil-label">Dirección</label>
                    <input type="text" name="direccion" id="direccion" class="perfil-input @error('direccion') campo-error @enderror" value="{{ old('direccion', $user->direccion) }}" placeholder="Ej: Calle 123, Ciudad">
                    @error('direccion')
                        <span class="perfil-error">{{ $message }}</span>
                    @enderror
                </div>

                <hr class="perfil-separador">
                <p class="perfil-nota">Deja los campos de contraseña vacíos si no deseas cambiarla.</p>

                <div class="perfil-form-grupo">
                    <label for="current_password" class="perfil-label">Contraseña actual</label>
                    <input type="password" name="current_password" id="current_password" class="perfil-input @error('current_password') campo-error @enderror" placeholder="Tu contraseña actual">
                    @error('current_password')
                        <span class="perfil-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="perfil-form-grupo">
                    <label for="password" class="perfil-label">Nueva contraseña</label>
                    <input type="password" name="password" id="password" class="perfil-input @error('password') campo-error @enderror" placeholder="Mínimo 8 caracteres">
                    @error('password')
                        <span class="perfil-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="perfil-form-grupo">
                    <label for="password_confirmation" class="perfil-label">Confirmar nueva contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="perfil-input" placeholder="Repite la nueva contraseña">
                </div>

                <div class="perfil-acciones">
                    <button type="submit" class="boton-perfil">Guardar cambios</button>
                    <a href="{{ route('perfil.show') }}" class="boton-perfil-secundario">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
