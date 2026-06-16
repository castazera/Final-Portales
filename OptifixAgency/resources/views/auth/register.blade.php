<x-layout>
    <x-slot:title>Registro</x-slot:title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <div class="fondo-login">
        <div class="contenedor-login">
            <h1 class="titulo-login">Crear Cuenta</h1>
            <p style="color: #E3D095; font-size: 1.2rem; font-weight: 600; margin-bottom: 1rem;">Únete a Optifix Agency</p>
            @if ($errors->any())
                <div class="alerta-login-error">
                    Por favor completa todos los campos correctamente.
                </div>
            @endif
            <form action="{{ route('auth.register') }}" method="POST" class="formulario-login" style="width:100%;">
                @csrf
                <div class="campo-login">
                    <span class="icono-campo"><i class="fas fa-user"></i></span>
                    <input type="text" name="name" placeholder="Nombre completo" class="@error('name') campo-error @enderror" value="{{ old('name') }}" >
                </div>
                @error('name')
                    <div class="alert alert-danger" style="color:#E3D095; background:none; border:none; padding:0; margin-bottom:0.5rem; text-align:left; font-size:0.98em;">{{ $message }}</div>
                @enderror
                <div class="campo-login">
                    <span class="icono-campo"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" placeholder="Correo electrónico" class="@error('email') campo-error @enderror" value="{{ old('email') }}" >
                </div>
                <div class="campo-login">
                    <span class="icono-campo"><i class="fas fa-phone"></i></span>
                    <input type="text" name="telefono" placeholder="Teléfono" class="@error('telefono') campo-error @enderror" value="{{ old('telefono') }}" >
                </div>
                @error('telefono')
                    <div class="alert alert-danger" style="color:#E3D095; background:none; border:none; padding:0; margin-bottom:0.5rem; text-align:left; font-size:0.98em;">{{ $message }}</div>
                @enderror
                <div class="campo-login">
                    <span class="icono-campo"><i class="fas fa-map-marker-alt"></i></span>
                    <input type="text" name="direccion" placeholder="Dirección" class="@error('direccion') campo-error @enderror" value="{{ old('direccion') }}" >
                </div>
                @error('direccion')
                    <div class="alert alert-danger" style="color:#E3D095; background:none; border:none; padding:0; margin-bottom:0.5rem; text-align:left; font-size:0.98em;">{{ $message }}</div>
                @enderror
                @error('email')
                    <div class="alert alert-danger" style="color:#E3D095; background:none; border:none; padding:0; margin-bottom:0.5rem; text-align:left; font-size:0.98em;">{{ $message }}</div>
                @enderror
                <div class="campo-login">
                    <span class="icono-campo"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" placeholder="Contraseña" class="@error('password') campo-error @enderror" >
                </div>
                @error('password')
                    <div class="alert alert-danger" style="color:#E3D095; background:none; border:none; padding:0; margin-bottom:0.5rem; text-align:left; font-size:0.98em;">{{ $message }}</div>
                @enderror
                <div class="campo-login">
                    <span class="icono-campo"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="@error('password_confirmation') campo-error @enderror" >
                </div>
                @error('password_confirmation')
                    <div class="alert alert-danger" style="color:#E3D095; background:none; border:none; padding:0; margin-bottom:0.5rem; text-align:left; font-size:0.98em;">{{ $message }}</div>
                @enderror
                <button type="submit" class="boton-login">Crear cuenta</button>
            </form>
            <div class="footer-login">
                <p>¿Ya tienes una cuenta? <a href="{{ route('auth.login') }}" class="enlace-login">Iniciar sesión</a></p>
            </div>
        </div>
    </div>
</x-layout>
