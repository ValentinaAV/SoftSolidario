<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed idReunion
 * @property mixed fecha
 * @property mixed descripcion
 * @property mixed cantidadAsistentes
 * @property mixed cantidadDecisiones
 */
class Reunion extends Model
{
    protected $table="reuniones";

    protected  $fillable=[
        'idEmpresa','descripcion','cantidadAsistentes','cantidadDecisiones',
    ];

    public function organizacion(){
        return $this->belongsTo('App\Organizacion');
    }
}
