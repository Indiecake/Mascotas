<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Raza;
use Illuminate\Http\Request;

class MascotaController extends Controller
{

    public function index()
    {
        $mascotas = Mascota::paginate(15);
        return view('mascotas.inicio')
        ->with('mascotas', $mascotas)
        ->with('title', 'Mascotas');
    }


    public function create()
    {
        $razas = Raza::all();
        return view('mascotas.nuevo')
        ->with('razas', $razas)
        ->with('title', 'Nueva mascota');
    }

    public function store(Request $request)
    {

        $rules = [
            'nombre' => 'required',
            'peso' => 'required',
            'altura' => 'required',
            'color' => 'required',
            'raza' => 'required',
        ];
        $this->validate($request, $rules);
        $id = $request->input('id');
        $nombre = $request->input('nombre');
        $peso = $request->input('peso');
        $altura = $request->input('altura');
        $color = $request->input('color');
        $raza = $request->input('raza');


        Mascota::Guardar($id, $nombre, $peso, $altura, $color, $raza);

        return redirect()->route('Mascota.inicio');
    }

    public function edit($id)
    {
        $mascota = Mascota::findOrFail($id);
        $razas = Raza::all();
        return view('mascotas.nuevo')
        ->with('mascota', $mascota)
        ->with('razas', $razas)
        ->with('title', 'Editar mascotas');
    }

    public function destroy($id)
    {
        Mascota::borrar($id);
        return redirect()->route('Mascota.inicio');
    }
}
