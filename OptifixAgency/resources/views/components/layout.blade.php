<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Optifix Agency</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  </head>
  <body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-proyecto">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">Optifix Agency</a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
            <x-nav-link route="home" href="{{ route('home') }}">Home</x-nav-link>
        </li>
        <li class="nav-item">
            <x-nav-link route="noticias.index" href="{{ route('noticias.index') }}">Noticias</x-nav-link>
        </li>
        <li class="nav-item">
            <x-nav-link route="services" href="{{ route('services') }}">Servicios</x-nav-link>
        </li>

        {{-- FALTA PONER EL LINK DE SOBRE NOSOTROS --}}
        {{-- <li class="nav-item">
            <x-nav-link route="about" href="{{ route('about') }}">Sobre nosotros</x-nav-link>
        </li> --}}

        @if(Auth::check() && Auth::user()->isAdmin())
        <li class="nav-item">
            <x-nav-link route="usuarios.lista" href="{{ route('usuarios.lista') }}">Lista de usuarios</x-nav-link>
        </li>
        @endif

        @if(Auth::check())
        <li class="nav-item dropdown">
            <a class="btn btn-sesion dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-proyecto">
                <li><a class="dropdown-item" href="{{ route('perfil.show') }}">Perfil</a></li>
                <li><a class="dropdown-item" href="{{ route('suscripciones.index') }}">Mis servicios</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ url('/cerrar-sesion') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </li>
        @else
        <li class="nav-item">
            <a href="{{ route('auth.login') }}" class="btn btn-sesion">Iniciar sesión</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
  </header>
   <main class="container-fluid">
    @if(session()->has('feedback.message'))
        <div class="alert-feedback-proyecto">
            {!! session('feedback.message') !!}
        </div>
    @endif
    {{ $slot }}
    @if(request()->routeIs('home'))
    <section class="home-main">
        <section class="home-hero">
            <div class="home-hero-content">
                <div>
                    <h1 class="home-titulo">Impulsa tu empresa con <span class="home-acento">soluciones de Inteligencia Artificial</span> a medida</h1>
                    <p class="home-desc">Desarrollamos chatbots inteligentes, automatizamos procesos y analizamos datos para que tu negocio crezca más rápido y con menos esfuerzo.</p>
                </div>
                <div class="home-hero-img">
                    <img src="{{ asset('img\logo\logo-Optifix-_1_.webp') }}" alt="Soluciones IA" />
                </div>
            </div>
        </section>
        <section class="home-clientes">
            <p class="home-clientes-titulo">Empresa que confía en nuestras soluciones de IA y automatización</p>
            <div class="home-clientes-logos">
                <img src="{{ asset('img\layout\Teleperformance_logo.svg.webp') }}" alt="Teleperformance" />
            </div>
        </section>
        <section class="home-impacto">
            <h2 class="home-subtitulo">Transforma tu negocio con IA: chatbots, automatización y análisis de datos</h2>
            <p class="home-impacto-desc">Creamos asistentes virtuales, automatizamos tareas repetitivas y extraemos valor de tus datos con Inteligencia Artificial. <br><span class="home-acento">Aumenta la eficiencia, reduce costos y mejora la experiencia de tus clientes.</span></p>
            <ul class="home-lista">
                <li>Desarrollo de <span class="home-acento">chatbots inteligentes</span> para atención al cliente y ventas</li>
                <li>Automatización de procesos empresariales con IA y RPA</li>
                <li><span class="home-acento">Análisis de datos</span> avanzado y visualización de información clave</li>
                <li>Integración de soluciones IA en tus sistemas actuales</li>
            </ul>
        </section>
        <section class="home-solucion">
            <div class="home-solucion-card">
                <div>
                    <h3 class="home-solucion-titulo">Soluciones estratégicas de IA para empresas</h3>
                    <p class="home-solucion-desc">Te acompañamos en la adopción de Inteligencia Artificial: desde el diagnóstico y la consultoría, hasta el desarrollo e integración de chatbots, automatización y analítica de datos personalizada para tu negocio.</p>
                </div>
            </div>
            <div class="home-metodologia">
                <h4 class="home-metodologia-titulo">¿Cómo trabajamos?</h4>
                <ul class="home-lista">
                    <li><b>Diagnóstico IA:</b> analizamos tus procesos y detectamos oportunidades de automatización y mejora con IA</li>
                    <li><b>Desarrollo de chatbots:</b> creamos asistentes virtuales personalizados para tu empresa</li>
                    <li><b>Automatización:</b> implementamos bots y flujos inteligentes para tareas repetitivas</li>
                    <li><b>Análisis de datos:</b> visualizamos y extraemos insights de tus datos para la toma de decisiones</li>
                    <li><b>Soporte y evolución:</b> acompañamos el crecimiento y mejora continua de tus soluciones IA</li>
                </ul>
                <a href="{{ route('services') }}" class="home-boton">Quiero saber más</a>
            </div>
        </section>
        <section class="home-areas">
            <h3 class="home-areas-titulo">¿Qué podemos hacer por tu empresa con <span class="home-acento">Inteligencia Artificial?</span></h3>
            <div class="home-areas-grid">
                <div class="home-area-card">
                    <div class="home-area-icono"><i class="fas fa-robot"></i></div>
                    <h5>Desarrollo de Chatbots</h5>
                    <p>Asistentes virtuales para atención al cliente, ventas y soporte, disponibles 24/7.</p>
                </div>
                <div class="home-area-card">
                    <div class="home-area-icono"><i class="fas fa-cogs"></i></div>
                    <h5>Automatización de procesos</h5>
                    <p>Bots y flujos inteligentes que ahorran tiempo y reducen errores en tareas repetitivas.</p>
                </div>
                <div class="home-area-card">
                    <div class="home-area-icono"><i class="fas fa-chart-bar"></i></div>
                    <h5>Análisis de datos</h5>
                    <p>Procesamiento, visualización y análisis predictivo para tomar mejores decisiones.</p>
                </div>
                <div class="home-area-card">
                    <div class="home-area-icono"><i class="fas fa-database"></i></div>
                    <h5>Integración de IA</h5>
                    <p>Conectamos soluciones inteligentes con tus sistemas actuales y plataformas digitales.</p>
                </div>
                <div class="home-area-card">
                    <div class="home-area-icono"><i class="fas fa-user-friends"></i></div>
                    <h5>Personalización de experiencia</h5>
                    <p>IA para segmentar clientes, recomendar productos y mejorar la experiencia de usuario.</p>
                </div>
                <div class="home-area-card">
                    <div class="home-area-icono"><i class="fas fa-shield-alt"></i></div>
                    <h5>Seguridad y compliance</h5>
                    <p>Soluciones IA para monitoreo, prevención de fraudes y cumplimiento normativo.</p>
                </div>
            </div>
        </section>
    </section>
    @endif
   </main>
   <footer class="footer-proyecto">
       <div class="footer-content">
           <span>© {{ date('Y') }} Optifix Agency. Todos los derechos reservados.</span>
       </div>
   </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
  </body>
</html>
