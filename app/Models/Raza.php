<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Raza extends Model
{
    use SoftDeletes;
    protected $table = 'razas';
    public $fillable=[
        'raza'
    ];



    public function ScopeGuardar($query, $id, $nombre)
    {
        if ($id == 0) {
            $raza = new Raza();
        }else {
            $raza = Raza::find($id);
        }
        $raza->raza=$nombre;
        $raza->save();
        return $raza->id;
    }

    public function ScopeBorrar($query, $id)
    {
        $raza = Raza::findOrFail($id);
        $raza->delete();
    }
}
