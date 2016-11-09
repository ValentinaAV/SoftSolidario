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

class ActividadEconomica extends Model
{
    protected $table="actividadesEconomicas";

    protected  $fillable=[
        'anio','descripcion','valor','tipo','idPatrimonio',
    ];


    public function patrimonio(){
        return $this->belongsTo('App\Patrimonio');
    }
}
