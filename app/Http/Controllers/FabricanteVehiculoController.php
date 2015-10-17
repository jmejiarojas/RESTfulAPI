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
	{	/*
		$fabricante = Fabricante::find($id);
		//$vehiculos = $fabricante->vehiculos;

		if(!$fabricante){
			return response()->json(['mensaje' => 'No se encuentra este fabricante','codigo' => 404], 404);
		}else{
			return response()->json(['datos' => $fabricante->vehiculos],200);
		}
	*/
		$fabricante = Fabricante::find($id);
		if(!$fabricante){
			return response()->json(['mensaje' => 'No existe el fabricante de id: '.$id, 'codigo' => 404],404);
		}else{
			return response()->json(['data' => $fabricante->vehiculos, 'codigo' => 202], 202);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		return "Mostrando formulario para crear vehiculo del fabricante : ".$id;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($idFabricante, $idVehiculo)
	{
		return 'Mostrando vehiculo '.$idVehiculo." del fabricante: ".$idFabricante;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($idFabricante, $idVehiculo)
	{
		return 'Editando vehiculo '.$idVehiculo.' del fabricante '.$idFabricante;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($idFabricante, $idVehiculo)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($idFabricante, $idVehiculo)
	{
		//
	}

}
