<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdenDeServicioController extends Controller
{
        public function index()
    {
        $ordenes = OrdenDeServicio::all();

        return view('ordenes.index', compact('ordenes'));
    }

    public function create()
    {
        return view('ordenes.create');
    }

     public function store(Request $request)
    {
        $datos = $request->validate([
            'cliente_id' => 'required|integer',
            'usuario_id' => 'required|integer',
            'codigo_orden' => 'required|string|max:50|unique:orden_de_servicio,codigo_orden',
            'descripcion' => 'required|string',
            'tipo_servicio' => 'required|string|max:50',
            'prioridad' => 'required|in:Baja,Media,Alta,Urgente',
            'estado' => 'required|in:Pendiente,En Proceso,Cerrada,Cancelada',
            'fecha_cierre_estimada' => 'nullable|date'
        ]);

          OrdenDeServicio::create($datos);

        return redirect()->route('ordenes.index')
            ->with('success', 'Orden creada correctamente.');
    }

    public function edit($id)
    {
        $orden = OrdenDeServicio::findOrFail($id);

        return view('ordenes.edit', compact('orden'));
    }
public function update(Request $request, $id)
    {
        $orden = OrdenDeServicio::findOrFail($id);

        $datos = $request->validate([
            'cliente_id' => 'required|integer',
            'usuario_id' => 'required|integer',
            'codigo_orden' => 'required|string|max:50|unique:orden_de_servicio,codigo_orden,' . $id,
            'descripcion' => 'required|string',
            'tipo_servicio' => 'required|string|max:50',
            'prioridad' => 'required|in:Baja,Media,Alta,Urgente',
            'estado' => 'required|in:Pendiente,En Proceso,Cerrada,Cancelada',
            'fecha_cierre_estimada' => 'nullable|date'
        ]);

        $orden->update($datos);

        return redirect()->route('ordenes.index')
            ->with('success', 'Orden actualizada correctamente.');
    }
}
