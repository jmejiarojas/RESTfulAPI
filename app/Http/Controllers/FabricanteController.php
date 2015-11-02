<?php namespace App\Http\Controllers;

use App\Fabricante;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FabricanteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(){
		$this->middleware('auth.basic',['only' => ['store','update','destroy']]);
	}

	public function index()
	{
		$fabricantes = Fabricante::all();
		return response()->json(['datos' => $fabricantes],200);

	}


	public function store(Request $request)
	{
		//Si no recibimos los valores
		if((!$request->input('nombre') || (!$request->input('telefono')))){
			return response()->json(['mensaje' => 'Complete datos...','codigo' => 422],422);
		}
		Fabricante::create($request->all());
		return response()->json(['mensaje' => 'datos insertados', 'codigo'=>201], 201);
	}

	public function show($id)
	{
		$fabricante= Fabricante::find($id);
		if(!$fabricante){
			return response()->json(['mensaje' => 'No se encuentra este fabricante','codigo' => 404],404);
		}
		return response()->json(['dato'=>$fabricante],200);
	}

	public function update(Request $request,$id)
	{
		$metodo = $request->method();
		$fabricante = Fabricante::find($id);

		if(!$fabricante){
			return response()->json(['mensaje' => 'No se encuentra el fabricante', 'codigo' => 404],404);
		}

		if($metodo === "PATCH"){
			$nombre = $request->input('nombre');
			if($nombre != null && $nombre != ''){
				$fabricante->nombre = $nombre;
			}
			$telefono = $request->input('telefono');
			if($telefono != null && $telefono != ''){
				$fabricante->telefono = $telefono;
			}
			$fabricante->save();
			return response()->json(['mensaje' => 'Datos modificados', 'codigo' => 200],200);
		}else{ //Es porque el metodo es PUT

			$nombre = $request->input('nombre');
			$telefono = $request->input('telefono');

			if(!$nombre || !$telefono){
				return response()->json(['mensaje' => 'No podemos procesar los datos', 'codigo' => 422], 422);
			}else{
				$fabricante->nombre = $request->input('nombre');
				$fabricante->telefono = $request->input('telefono');
				$fabricante->save();
				return response()->json(['mensaje' => 'Datos actualizados', 'codigo' => 200], 200);
			}
		}
	}


}
