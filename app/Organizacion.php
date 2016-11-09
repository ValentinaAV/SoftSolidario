<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed idEmpresa
 * @property mixed nombre
 * @property mixed telefono
  * @property mixed direccion
 * @property mixed razonSocial
 */

class Organizacion extends Model
{
    protected $table="organizaciones";

    protected  $fillable=[
        'nombre','telefono','direccion','razonSocial',
    ];

    public function patrimonio(){
        return $this->hashMany('App\Patrimonio');
    }

    public function reunion(){
        return $this->hashMany('App\Reunion');
    }

    public function dicatamen(){
        return $this->hashMany('App\Dictamen');
    }
}
