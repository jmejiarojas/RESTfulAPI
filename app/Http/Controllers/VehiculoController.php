<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller {


	public function index()
	{
		$vehiculos = Vehiculo::all();
		return response()->json(['datos' => $vehiculos],200);
	}

	public function show($id)
	{

		$vehiculo = Vehiculo::find($id);

		if(!$vehiculo){
			return response()->json(['mensaje' => 'No se encontro el vehiculo de id: '.$id, 'codigo' => 404],404);
		}else{
			return response()->json(['dato' => $vehiculo , 'codigo' => 202], 202);
		}
	}


}
