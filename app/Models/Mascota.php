<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mascota extends Model
{
    public $table = 'mascotas';
    public $fillable=[
        'nombre',
        'peso',
        'altura',
        'color'
    ];

    use SoftDeletes;

    public function ScopeGuardar($query, $id, $nombre, $peso, $altura, $color, $raza)
    {
        if ($id == 0) {
            $mascota = new Mascota();
        }else {
            $mascota = Mascota::findOrFail($id);
        }
        $mascota->nombre = $nombre;
        $mascota->peso = $peso;
        $mascota->altura = $altura;
        $mascota->color = $color;
        $mascota->raza_id = $raza;
        $mascota->save();
        return $mascota->id;
    }

    public function ScopeBorrar($query, $id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->delete();
    }

    public function Raza()
    {
        return $this->hasOne('App\Models\Raza', 'id', 'raza_id')->withTrashed();
    }
}
