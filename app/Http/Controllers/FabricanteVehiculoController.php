<?php namespace App\Http\Controllers;

use App\Fabricante;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vehiculo;
use Illuminate\Http\Request;

class FabricanteVehiculoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function  __construct(){
		$this->middleware('auth.basic',['only'=>['store','update','store']]);
	}

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


	public function store(Request $request, $id)
	{
		//Validamos si recibimos todos los parametros: color, cilindraje, potencia, peso
		/*$color = $request->input('color');
		$cilindraje = $request->input('cilindraje');
		$potencia = $request->input('potencia');
		$peso = $request->input('peso'); */


		if(!$request->input('color') || !$request->input('cilindraje') || !$request->input('potencia') || !$request->input('peso')){
			return response()->json(['mensaje' => 'Complete los datos ...' , 'codigo' => 422], 422);
			//return "Complete todos los datos";
		}

		$fabricante = Fabricante::find($id);

		if(!$fabricante){
			return response()->json(['mensaje' => 'No se encuentra el fabricante con id: '.$id, 'codigo' => 422],422);
		}

		$fabricante->vehiculos()->create($request->all());
		return response()->json(['mensaje' => 'Vehiculo insertado', 'codigo' => 201],201);
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
