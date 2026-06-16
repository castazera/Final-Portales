<x-layout>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <div class="fondo-login">
        <div class="contenedor-login">
            <h1 class="titulo-login">Login</h1>
            @if ($errors->any())
                <div class="alerta-login-error">
                    Por favor completa todos los campos correctamente.
                </div>
            @endif
            <form action="{{ route('auth.authenticate') }}" method="post">
                @csrf
                <div class="campo-login">
                    <span class="icono-campo"><i class="fas fa-user"></i></span>
                    <input type="email" name="email" placeholder="Username" value="{{ old('email') }}" >
                </div>
                @error('email')
                    <div class="alert alert-danger" style="color:#E3D095; background:none; border:none; padding:0; margin-bottom:0.5rem; text-align:left; font-size:0.98em;">{{ $message }}</div>
                @enderror
                <div class="campo-login">
                    <span class="icono-campo"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" placeholder="Password" value="{{ old('password') }}" >
                </div>
                @error('password')
                    <div class="alert alert-danger" style="color:#E3D095; background:none; border:none; padding:0; margin-bottom:0.5rem; text-align:left; font-size:0.98em;">{{ $message }}</div>
                @enderror
                <button type="submit" class="boton-login">LOGIN</button>
            </form>
            <div class="footer-login">
                <p>¿No tienes una cuenta? <a href="{{ route('auth.register') }}" class="enlace-login">Regístrate aquí</a></p>
            </div>
        </div>
    </div>
</x-layout>
