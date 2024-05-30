<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquilino;
use App\Models\Alquiler;

class InquilinoController extends Controller
{
    public function index()
    {
        $inquilinos = Inquilino::all();
        return view('inquilinos.index', compact('inquilinos'));
    }

    public function create()
    {
        return view('inquilinos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo_electronico' => 'required|string|email|max:255|unique:inquilinos',
        ]);

        $inquilino = Inquilino::create([
            'nombre' => $request->nombre,
            'correo_electronico' => $request->correo_electronico,
        ]);

        return redirect()->route('inquilinos.index')->with('success', 'Inquilino creado con éxito.');
    }

    public function show($id)
    {
        $inquilino = Inquilino::findOrFail($id);
        $alquileres = $inquilino->alquileres;
        return view('inquilinos.show', compact('inquilino', 'alquileres'));
    }

    public function edit($id)
    {
        $inquilino = Inquilino::findOrFail($id);
        return view('inquilinos.edit', compact('inquilino'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo_electronico' => 'required|string|email|max:255|unique:inquilinos,correo_electronico,' . $id,
        ]);

        $inquilino = Inquilino::findOrFail($id);
        $inquilino->update([
            'nombre' => $request->nombre,
            'correo_electronico' => $request->correo_electronico,
        ]);

        return redirect()->route('inquilinos.index')->with('success', 'Inquilino actualizado con éxito.');
    }

    public function destroy($id)
    {
        $inquilino = Inquilino::findOrFail($id);
        $inquilino->delete();

        return redirect()->route('inquilinos.index')->with('success', 'Inquilino eliminado con éxito.');
    }
}
