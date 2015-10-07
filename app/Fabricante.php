<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model {

    protected $table = "fabricantes";
    protected  $fillable = ['nombre','telefono'];

    public function vehiculos(){

        $this->hasMany('Vehiculo');
    }

}
