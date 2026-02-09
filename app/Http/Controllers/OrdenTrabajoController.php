<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenTrabajo;

class OrdenTrabajoController extends Controller
{
    public function index()
    {
        $ordenes = OrdenTrabajo::latest()->get();
        return view('ot.index', compact('ordenes'));
    }
    public function create()
    {
    return view('ot.create');
    }
    public function store(Request $request)
    {
        OrdenTrabajo::create([
            'cliente' => $request->cliente,
            'equipo' => $request->equipo,
            'problema' => $request->problema,
            'tecnico' => $request->tecnico,
            'observaciones' => $request->observaciones,
        ]);
        return redirect('/ot');
    }
    public function edit($id)
    {
    $ot = OrdenTrabajo::findOrFail($id);
    return view('ot.edit', compact('ot'));
    }
    public function update(Request $request, $id)
    {
    $ot = OrdenTrabajo::findOrFail($id);
    $ot->update([
        'cliente' => $request->cliente,
        'equipo' => $request->equipo,
        'problema' => $request->problema,
        'tecnico' => $request->tecnico,
        'estado' => $request->estado,
        'observaciones' => $request->observaciones,
    ]);
    return redirect('/ot');
    }
    public function destroy($id)
    {
    $ot = OrdenTrabajo::findOrFail($id);
    $ot->delete();
    return redirect('/ot');
    }
}
