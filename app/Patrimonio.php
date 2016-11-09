<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed idPatrimonio
 * @property mixed idEmpresa
 * @property mixed id
 * @property mixed valor
 */
class Patrimonio extends Model
{
    protected $table="patrimonios";

    protected  $fillable=[
        'idEmpresa','anio','valor',
    ];

    public function actividadEconomica(){
        return $this->hashMany('App\ActividadEconomica');
    }

    public function organizacion(){
        return $this->belongsTo('App\Organizacion');
    }
}
