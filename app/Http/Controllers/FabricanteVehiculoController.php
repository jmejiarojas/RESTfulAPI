<?php namespace App\Http\Controllers;

use App\Fabricante;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FabricanteVehiculoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function index($id)
	{

		$fabricante = Fabricante::find($id);
		if(!$fabricante){
			return response()->json(['mensaje' => 'No existe el fabricante de id: '.$id, 'codigo' => 404],404);
		}else{
			return response()->json(['data' => $fabricante->vehiculos, 'codigo' => 202], 202);
		}
	}


	public function create($id)
	{
		return "Mostrando formulario para crear vehiculo del fabricante : ".$id;
	}


	public function store()
	{

	}


	public function show($idFabricante, $idVehiculo)
	{
		return 'Mostrando vehiculo '.$idVehiculo." del fabricante: ".$idFabricante;
	}


	public function edit($idFabricante, $idVehiculo)
	{
		return 'Editando vehiculo '.$idVehiculo.' del fabricante '.$idFabricante;
	}


	public function update($idFabricante, $idVehiculo)
	{
		//
	}


	public function destroy($idFabricante, $idVehiculo)
	{
		//
	}

}
