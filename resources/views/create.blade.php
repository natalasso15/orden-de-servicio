
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Orden</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 30px;
        }

        form {
            background: white;
            padding: 25px;
            max-width: 650px;
            margin: auto;
            border-radius: 10px;
        }

        h1 { color: #243b55; }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 12px 20px;
            background: #0879df;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .errores {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
        }
    </style>
</head>
<body>

    <form action="{{ route('ordenes.store') }}" method="POST">

        @csrf

        <h1>Crear Orden de Servicio</h1>

        @if($errors->any())
            <div class="errores">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label>Cliente ID:</label>
        <input type="number" name="cliente_id"
               value="{{ old('cliente_id') }}" required>

        <label>Usuario ID:</label>
        <input type="number" name="usuario_id"
               value="{{ old('usuario_id') }}" required>

        <label>Código de Orden:</label>
        <input type="text" name="codigo_orden"
               value="{{ old('codigo_orden') }}" required>

        <label>Descripción:</label>
        <textarea name="descripcion" required>{{ old('descripcion') }}</textarea>

        <label>Tipo de Servicio:</label>
        <select name="tipo_servicio" required>
            <option value="">Seleccione</option>
            <option value="Instalación" @selected(old('tipo_servicio') == 'Instalación')>Instalación</option>
            <option value="Reparación" @selected(old('tipo_servicio') == 'Reparación')>Reparación</option>
            <option value="Mantenimiento" @selected(old('tipo_servicio') == 'Mantenimiento')>Mantenimiento</option>
        </select>

        <label>Prioridad:</label>
        <select name="prioridad" required>
            @foreach(['Baja', 'Media', 'Alta', 'Urgente'] as $valor)
                <option value="{{ $valor }}"
                    @selected(old('prioridad', 'Media') == $valor)>
                    {{ $valor }}
                </option>
            @endforeach
        </select>

        <label>Estado:</label>
        <select name="estado" required>
            @foreach(['Pendiente', 'En Proceso', 'Cerrada', 'Cancelada'] as $valor)
                <option value="{{ $valor }}"
                    @selected(old('estado', 'Pendiente') == $valor)>
                    {{ $valor }}
                </option>
            @endforeach
        </select>

        <label>Fecha de Cierre Estimada:</label>
        <input type="date" name="fecha_cierre_estimada"
               value="{{ old('fecha_cierre_estimada') }}">

        <button type="submit">Guardar Orden</button>

        <a href="{{ route('ordenes.index') }}">Cancelar</a>

    </form>

</body>
</html>
