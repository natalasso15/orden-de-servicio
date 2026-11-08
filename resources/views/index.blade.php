<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Órdenes de Servicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f4f6f9;
        }

        h1 { color: #243b55; }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #243b55;
            color: white;
        }

        a, button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .crear, .editar {
            background: #0879df;
            color: white;
        }

        .mensaje {
            background: #d4edda;
            padding: 12px;
            margin-bottom: 15px;
            color: #155724;
        }
    </style>
</head>
<body>

    <h1>Órdenes de Servicio</h1>

    @if(session('success'))
        <div class="mensaje">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('ordenes.create') }}" class="crear">
        + Nueva Orden
    </a>

    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Usuario</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Tipo de Servicio</th>
                <th>Prioridad</th>
                <th>Estado</th>
                <th>Fecha Estimada</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse($ordenes as $orden)
                <tr>
                    <td>{{ $orden->id }}</td>
                    <td>{{ $orden->cliente_id }}</td>
                    <td>{{ $orden->usuario_id }}</td>
                    <td>{{ $orden->codigo_orden }}</td>
                    <td>{{ $orden->descripcion }}</td>
                    <td>{{ $orden->tipo_servicio }}</td>
                    <td>{{ $orden->prioridad }}</td>
                    <td>{{ $orden->estado }}</td>
                    <td>{{ $orden->fecha_cierre_estimada }}</td>
                    <td>
                        <a class="editar"
                           href="{{ route('ordenes.edit', $orden->id) }}">
                            Editar
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">
                        No hay órdenes de servicio registradas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>