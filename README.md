# 🚀 OptifixAgency - Portal Web Empresarial


## 📋 Descripción

OptifixAgency es una plataforma web empresarial desarrollada con Laravel que permite gestionar noticias, servicios y usuarios de manera eficiente. La aplicación incluye un sistema de autenticación completo, gestión de contenido dinámico y una interfaz moderna y responsiva.

## ✨ Características Principales

### 🏠 Páginas Principales
- **Página de Inicio**: Landing page con información general de la empresa
- **Quiénes Somos**: Información corporativa y valores de la empresa
- **Servicios**: Catálogo de servicios ofrecidos por la empresa

### 📰 Sistema de Noticias
- ✅ Crear, editar y eliminar noticias
- ✅ Categorización de noticias
- ✅ Sistema de estados (publicado/borrador)
- ✅ Vista detallada de noticias individuales
- ✅ Gestión de imágenes para noticias

### 🛠️ Gestión de Servicios
- ✅ CRUD completo de servicios
- ✅ Categorización de servicios
- ✅ Sistema de precios
- ✅ Adquisición de servicios por usuarios
- ✅ Gestión de imágenes para servicios

### 👥 Sistema de Usuarios
- ✅ Registro e inicio de sesión
- ✅ Gestión de perfiles de usuario
- ✅ Lista de usuarios (para administradores)
- ✅ Relación muchos a muchos entre usuarios y servicios

### 🔐 Autenticación y Seguridad
- ✅ Sistema de autenticación completo
- ✅ Middleware de protección de rutas
- ✅ Gestión de sesiones seguras
- ✅ Contraseñas hasheadas

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 11.x** - Framework PHP
- **PHP 8.2+** - Lenguaje de programación
- **MySQL/SQLite** - Base de datos

### Frontend
- **Tailwind CSS 3.x** - Framework CSS
- **Blade Templates** - Motor de plantillas
- **Vite** - Build tool y bundler
- **JavaScript ES6+** - Interactividad del lado cliente

### Herramientas de Desarrollo
- **Composer** - Gestión de dependencias PHP
- **Artisan** - CLI de Laravel
- **Laravel Pint** - Formateador de código
- **PHPUnit** - Testing framework

## 📦 Instalación

### Prerrequisitos
- PHP 8.2 o superior
- Composer
- Node.js y npm
- Servidor web (Apache/Nginx) o servidor de desarrollo

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/tu-usuario/OptifixAgency.git
   cd OptifixAgency
   ```

2. **Instalar dependencias PHP**
   ```bash
   composer install
   ```

3. **Configurar variables de entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configurar la base de datos**
   - Editar el archivo `.env` con tus credenciales de base de datos
   - Ejecutar las migraciones:
   ```bash
   php artisan migrate
   ```

5. **Ejecutar seeders (opcional)**
   ```bash
   php artisan db:seed
   ```

6. **Instalar dependencias de frontend**
   ```bash
   npm install
   ```

7. **Compilar assets**
   ```bash
   npm run dev
   ```

8. **Iniciar el servidor de desarrollo**
   ```bash
   php artisan serve
   ```

La aplicación estará disponible en `http://localhost:8000`

## 🗄️ Estructura de la Base de Datos

### Tablas Principales

#### `users`
- `id` - Identificador único
- `name` - Nombre del usuario
- `email` - Correo electrónico
- `password` - Contraseña hasheada
- `email_verified_at` - Verificación de email
- `remember_token` - Token de sesión

#### `noticias`
- `id` - Identificador único
- `titulo` - Título de la noticia
- `resumen` - Resumen de la noticia
- `contenido` - Contenido completo
- `autor` - Autor de la noticia
- `imagen` - Ruta de la imagen
- `categoria` - Categoría de la noticia
- `estado` - Estado (publicado/borrador)
- `fecha` - Fecha de publicación

#### `servicios`
- `id` - Identificador único
- `nombre` - Nombre del servicio
- `descripcion` - Descripción breve
- `detalles` - Detalles completos
- `categoria` - Categoría del servicio
- `precio` - Precio del servicio
- `imagen` - Ruta de la imagen
- `estado` - Estado del servicio

#### `servicio_user` (Tabla pivote)
- `servicio_id` - ID del servicio
- `user_id` - ID del usuario
- `fecha_adquisicion` - Fecha de adquisición

## 🚀 Uso

### Rutas Principales

#### Páginas Públicas
- `/` - Página de inicio
- `/quienes-somos` - Información de la empresa
- `/servicios` - Catálogo de servicios
- `/noticias/principales` - Lista de noticias

#### Autenticación
- `/iniciar-sesion` - Formulario de login
- `/registro` - Formulario de registro

#### Gestión de Contenido (Requiere autenticación)
- `/noticias/agregar` - Crear nueva noticia
- `/noticias/{id}/editar` - Editar noticia
- `/servicios/lista` - Lista de servicios
- `/servicios/agregar` - Crear nuevo servicio
- `/servicios/{id}/editar` - Editar servicio

### Comandos Artisan Útiles

```bash
# Ejecutar migraciones
php artisan migrate

# Ejecutar seeders
php artisan db:seed

# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Crear enlaces simbólicos para storage
php artisan storage:link

# Listar todas las rutas
php artisan route:list
```

## 🎨 Personalización

### Estilos CSS
Los estilos están organizados en archivos CSS específicos en `public/css/`:
- `layout.css` - Estilos generales del layout
- `nav.css` - Estilos de navegación
- `login.css` - Estilos de autenticación
- `noticias.css` - Estilos de noticias
- `servicios.css` - Estilos de servicios

### Componentes Blade
Los componentes reutilizables se encuentran en `resources/views/components/`:
- `layout.blade.php` - Layout principal
- `nav-link.blade.php` - Enlaces de navegación

## 📁 Estructura del Proyecto

```
OptifixAgency/
├── app/
│   ├── Http/Controllers/     # Controladores
│   ├── Models/              # Modelos Eloquent
│   └── View/Components/     # Componentes de vista
├── database/
│   ├── migrations/          # Migraciones de BD
│   └── seeders/            # Seeders de datos
├── public/
│   ├── css/                # Archivos CSS compilados
│   └── img/                # Imágenes estáticas
├── resources/
│   └── views/              # Vistas Blade
├── routes/
│   └── web.php             # Rutas web
└── storage/                # Archivos subidos
```

**Brian Gabriel Fernandez**
- GitHub: [@castazera](https://github.com/castazera)
- Email: briandrew859@gmail.com
