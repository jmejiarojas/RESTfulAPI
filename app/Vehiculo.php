<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model {

    protected $table = "vehiculos";
    protected $primaryKey = "serie";
    protected $fillable = ['color', 'cilindraje','potencia','peso'];

    public  function fabricante(){
        $this->belongsTo('Fabricante');
    }

}
