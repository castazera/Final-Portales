<x-layout>
    <x-slot:title>Lista de Usuarios</x-slot:title>
    <div class="usuarios-container">
        <h1 class="usuarios-titulo">Usuarios registrados</h1>
        <div class="usuarios-table-responsive">
            <table class="usuarios-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha de registro</th>
                        <th>¿Adquirió servicio?</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->created_at ? $usuario->created_at->format('d/m/Y H:i') : '-' }}</td>
                            <td>
                                @if($usuario->servicios->isNotEmpty())
                                    {{ $usuario->servicios->pluck('nombre')->join(', ') }}
                                @else
                                    No
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
