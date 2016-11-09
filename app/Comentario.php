<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed idActividad
 * @property mixed anio
 * @property mixed descripcion
 * @property mixed valor
 * @property mixed tipo
 * @property mixed idPatrimonio
 */

class Comentario extends Model
{
    protected $table="comentarios";

    protected  $fillable=[
        'descripcion','idEmpresa',
    ];


    public function organizacion(){
        return $this->belongsTo('App\Organizacion');
    }
}
