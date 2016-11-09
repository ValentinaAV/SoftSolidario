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
class Dictamen extends Model
{
    protected $table="dictamenes";

    protected  $fillable=[
        'idEmpresa','nombreAuditor','numTarjetaProfesional','cantLLamadosAtencion',
    ];

    public function organizacion(){
        return $this->belongsTo('App\Organizacion');
    }
}
