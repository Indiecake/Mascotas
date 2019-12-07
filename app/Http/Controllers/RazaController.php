<?php

namespace App\Http\Controllers;

use App\Models\Raza;
use Illuminate\Http\Request;

class RazaController extends Controller
{
    public function index()
    {
        $razas = Raza::paginate(10);
        return view('razas.inicio')
        ->with('razas', $razas)
        ->with('title', 'Razas');
    }

    public function create()
    {
        return view('razas.nuevo')
        ->with('title', 'Registrar raza');
    }

    public function store(Request $request)
    {
        $rules = [
            'raza' => 'required|unique:razas',
        ];
        $this->validate($request, $rules);
        $id = $request->input('id');
        $raza = $request->input('raza');
        Raza::Guardar($id, $raza);

        return redirect()->route('Raza.inicio');
    }


    public function edit($id)
    {
        $raza=Raza::findOrFail($id);
        return view('razas.nuevo')
        ->with('raza', $raza)
        ->with('title', 'Editar raza');
    }

    public function destroy($id)
    {
        Raza::destroy($id);
        return redirect()->route('Raza.inicio');
    }
}
